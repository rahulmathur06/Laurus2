<?php

/**
 * EmpresasController
 * 
 * This is the controller for module's "Types of Empresas" option * 
 */

namespace Modules\CuentasCorporativas\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Pingpong\Modules\Routing\Controller;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Modules\CuentasCorporativas\Entities\Empresas;
use Modules\CuentasCorporativas\Entities\EmpresasCredito;
use Modules\CuentasCorporativas\Http\Requests\EmpresasRequest;
use Modules\CuentasCorporativas\Http\Requests\EmpresasEditRequest;
use Illuminate\Support\Facades\DB;
use Modules\Roles\Entities\Rol;
use Modules\Tasks\Entities\Task;
use Modules\Notifications\Entities\Notification;
use Illuminate\Http\Request;
use Modules\CuentasCorporativas\Entities\EmpresasTask;
use Modules\CuentasCorporativas\Entities\EmpresasAuthTask;
use Modules\Tasks\Entities\Note;
use Modules\CuentasCorporativas\Entities\PersonasTipo;

class EmpresasController extends Controller {

    protected $auth;
    protected $Empresas;
    protected $EmpresasCredito;

    public function __construct(Empresas $Empresas, EmpresasCredito $EmpresasCredito) {
        $this->auth = Sentinel::getUser();
        $this->Empresas = $Empresas;
        $this->EmpresasCredito = $EmpresasCredito;
    }

    /**
     * Function to display the listing of main enterprise records
     * 
     * @return type
     */
    public function index() {
        if (Sentinel::hasAccess('cuentascorporativas.empresas.view')) {
            $Empresas = $this->Empresas->all();
            return view('cuentascorporativas::empresas.index', compact('Empresas'));
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * Show the form for creating a new enterprise.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (Sentinel::hasAccess('cuentascorporativas.empresas.view')) {
            $requireCredit = false;
            $estados = DB::table('Mexico_Estados')->lists('NOMBRE', 'ID');
            $personasTipo = PersonasTipo::lists('descripcion', 'id');
            $ciudades = DB::table('Mexico_Ciudades')->where('Estado_ID', 1)->lists('NOMBRE', 'NOMBRE');
            $empresas = $this->Empresas->lists('nombre', 'id')->prepend('Ninguono', 0);
            $ejecutivas = Rol::where('slug', 'Ejecutivo')->first()->users()->lists('first_name', 'id');
            return view('cuentascorporativas::empresas.create', compact('requireCredit', 'estados', 'empresas', 'ejecutivas', 'ciudades','personasTipo'));
        }

        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * Store a newly created enterprise in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresasRequest $request) {
        if (Sentinel::hasAccess('cuentascorporativas.empresas.view')) {
            $fillable = $request->only('rfc', 'razon_social', 'nombre', 'empresas_codigo', 'direccion_calle', 'direccion_ciudad', 'direccion_colonia', 'direccion_municipio', 'direccion_estado', 'direccion_codigo_postal', 'telefono1', 'telefono2', 'fax', 'email', 'empresaPadre', 'ejecutiva_id', 'representante', 'comentarios', 'depto_contabilidad', 'depto_contabilidad_email', 'depto_compras', 'depto_compras_email', 'giro', 'numero_empleados','tipo_persona_id');
            $logo = $this->uploadImage($request->file('logo'), "logo");
            //set cliente_fiscal checkbox default value
            $fillable['cliente_fiscal'] = isset($request->cliente_fiscal) ? 1 : 0;
            $fillable['logo'] = $logo;
            //Fill entity
            $this->Empresas->fill($fillable);
            //Save Entity
            $this->Empresas->save();

            //Save credit entry if required
            if ($request->requiere_credito)
                $this->set_empresas_credito($this->Empresas->id, $request->only('plazo', 'garantia', 'limite', 'comprobante', 'status'));

            //create auhtorization task
            $this->createAuthorizationRequest($this->Empresas->id);
            //notify the specified role
            $this->createAuthorizationNotification($this->Empresas->id);

            flash()->success('Creación exitosa.');
            return redirect('empresas');
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * Display the specified enterprise.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, Request $request) {
        if (Sentinel::hasAccess('cuentascorporativas.empresas.approve')) {
            $Empresa = $this->Empresas->FindOrFail($id);
            $estados = DB::table('Mexico_Estados')->lists('NOMBRE', 'ID');
            $ciudades = DB::table('Mexico_Ciudades')->where('Estado_ID', $Empresa->direccion_estado)->lists('NOMBRE', 'NOMBRE');
            $empresas = $this->Empresas->where('id', '!=', $id)->lists('nombre', 'id')->prepend('Ninguono', 0);
            $ejecutivas = Rol::where('slug', 'Ejecutivo')->first()->users()->lists('first_name', 'id');
            $EmpresaCredito = $Empresa->credit;
            $requireCredit = (bool) $Empresa->credit;
            $task_id = $request->t_id;
            $tasks = collect([]);
            return view('cuentascorporativas::empresas.show', compact('Empresa', 'requireCredit', 'EmpresaCredito', 'estados', 'empresas', 'ejecutivas', 'ciudades', 'task_id','tasks'));
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * Show the form for editing the specified enterprise.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        if (Sentinel::hasAccess('cuentascorporativas.empresas.view')) {
            $Empresa = $this->Empresas->FindOrFail($id);
            $estados = DB::table('Mexico_Estados')->lists('NOMBRE', 'ID');
            $personasTipo = PersonasTipo::lists('descripcion', 'id');
            $ciudades = DB::table('Mexico_Ciudades')->where('Estado_ID', $Empresa->direccion_estado)->lists('NOMBRE', 'NOMBRE');
            $empresas = $this->Empresas->where('id', '!=', $id)->lists('nombre', 'id')->prepend('Ninguono', 0);
            $ejecutivas = Rol::where('slug', 'Ejecutivo')->first()->users()->lists('first_name', 'id');
            $EmpresaCredito = $Empresa->credit;
            $requireCredit = (bool) $Empresa->credit;
            //collect the task data for the enterprise
            $tasks = EmpresasTask::Where('empresa_tasks.empresa_id', '=', $id)
                    ->join('tasks', 'tasks.id', '=', 'empresa_tasks.task_id')
                    ->join('notes', 'notes.task_id', '=', 'empresa_tasks.task_id')
                    ->select('empresa_tasks.*', 'tasks.due_date', 'tasks.status', 'notes.comment')
                    ->orderBy('tasks.due_date', 'DESC')
                    ->get();
            return view('cuentascorporativas::empresas.edit', compact('Empresa', 'requireCredit', 'EmpresaCredito', 'estados', 'empresas', 'ejecutivas', 'ciudades', 'tasks','personasTipo'));
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * Update the specified enterprise in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresasEditRequest $request, $id) {
        if (Sentinel::hasAccess('cuentascorporativas.empresas.view')) {
            $fillable = $request->only('rfc', 'razon_social', 'nombre', 'empresas_codigo', 'logo', 'direccion_calle', 'direccion_ciudad', 'direccion_colonia', 'direccion_municipio', 'direccion_estado', 'direccion_codigo_postal', 'telefono1', 'telefono2', 'fax', 'email', 'empresaPadre', 'ejecutiva_id', 'representante', 'comentarios', 'depto_contabilidad', 'depto_contabilidad_email', 'depto_compras', 'depto_compras_email', 'giro', 'numero_empleados','tipo_persona_id');

            //set cliente_fiscal checkbox default value
            $fillable['cliente_fiscal'] = isset($request->cliente_fiscal) ? 1 : 0;
            $logo = $this->uploadImage($request->file('logo'), "logo");

            $Empresas = $this->Empresas->find($id);
            if (empty($logo) && $logo == '') {
                $fillable['logo'] = $Empresas->logo;
            } else {
                $fillable['logo'] = $logo;
            }
            // fill data
            $Empresas->fill($fillable);
            // save Entity
            $Empresas->save();

            $credit_id = $Empresas->credit ? $Empresas->credit->id : false;
            //var_dump($credit_id);die;
            //Save credit entry if required
            if ($request->requiere_credito)
                $this->set_empresas_credito($Empresas->id, $request->only('plazo', 'garantia', 'limite', 'comprobante', 'status'), $credit_id);
            //delete the old entry if user unchecked require credit after update
            elseif ($credit_id)
                $this->unset_empresas_credito($credit_id);

            // message
            flash()->success('Actualización exitosa.');

            return redirect('empresas');
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * Remove the specified enterprise from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Sentinel::hasAccess('cuentascorporativas.empresas.view')) {
            try {
                $Empresas = $this->Empresas->find($id);
                $Empresas->destroy($id);
                return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
            } catch (QueryException $e) {
                return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
            }
        }
        return response()->json(['msg' => 'No tiene permisos para acceder a esta area.'], 203);
    }

    /**
     *
     * Function to authorize the enterprise
     * 
     * @param Request $request
     * @return laravel response
     */
    public function authorize(Request $request) {
        if (Sentinel::hasAccess('cuentascorporativas.empresas.approve')) {
            $emprsa = $this->Empresas->findOrFail($request->enterprise_id);
            $emprsa->status = $request->enterprise_status === 'rejected' ? 0 : 1;
            $emprsa->save();
            $task = Task::findOrFail(EmpresasAuthTask::where('empresa_id', '=', $request->enterprise_id)->first()->task_id);
            if ($task) {
                $task->user_id_done = $this->auth->id;
                $task->status = "Completada";
                $task->progress = "100";
                $task->done_date = $task->today();
                $task->save();
            }
            alert()->success('', 'Exito!')->persistent('Cerrar');
            return redirect('tasks');
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * 
     * Function to assign a task to enterprise executive
     * 
     * @param Request $request
     * @return laravel response
     */
    public function assignTask(Request $request) {
        if (Sentinel::hasAccess('cuentascorporativas.empresas.task.assign')) {
            $enterprise = $this->Empresas->findOrFail($request->enterprise_id);
            $task = Task::create([
                        'flow_id' => config('cuentascorporativas.id_executive_crm_wf'),
                        'name' => $request->tipo_de_teria . ' : ' . $request->empresa_name,
                        'start_date' => Carbon::today(),
                        'due_date' => Carbon::today()->addDays(2),
                        'status' => 'pending',
                        'description' => 'Recordatorio de ' . $request->tipo_de_teria . ' empresa: ' . $request->empresa_name . '<br/><a href="' . route('empresas.edit', $enterprise->id) . '">Ver registro de la empresa Aquí</a>'
            ]);
            $task->addUser($request->executive_id);
            $note = Note::create([
                        'task_id' => $task->id,
                        'comment' => $request->notes
            ]);
            $note->users()->attach($this->auth->id);
            $enterprise_task = EmpresasTask::create([
                        'task_id' => $task->id,
                        'empresa_id' => $enterprise->id,
                        'type' => $request->tipo_de_teria
            ]);
            alert()->success('', 'Exito!')->persistent('Cerrar');
            return back();
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * 
     * Function to mark the executive task completed 
     * 
     * Created By : Parantap
     * Updated By : Parashar
     * Created Date : 30/DEC/2016 
     * Updated Date : 30/DEC/2016
     */
    public function markTaskAsCompleted($id, Request $request) {

        if (Sentinel::hasAccess('cuentascorporativas.empresas.task.mark')) {
            try {
                //find empresa task
                $empresa_task = EmpresasTask::findOrFail($id);
                //related user task
                $task = Task::findOrFail($empresa_task->task_id);

                //update the status of enterprise task
                $empresa_task->task_status = EmpresasTask::STATUS_COMPLETED;
                $empresa_task->save();

                //Update the task entry
                $task->user_id_done = $this->auth->id;
                $task->status = "Completada";
                $task->progress = "100";
                $task->done_date = $task->today();
                $task->save();
                return response()->json(['msg' => 'Record marked as completed'], 200);
            } catch (QueryException $e) {
                return response()->json(['msg' => 'No se pudo encontrar el registro'], 202);
            }
        }
        return response()->json(['msg' => 'No tiene permisos para acceder a esta area.'], 203);
    }

    /**
     * 
     * Function to mark the executive task canceled 
     * 
     * Created By : Parantap
     * Updated By : Parashar
     * Created Date : 30/DEC/2016 
     * Updated Date : 30/DEC/2016
     */
    public function markTaskAsCancelled($id, Request $request) {

        if (Sentinel::hasAccess('cuentascorporativas.empresas.task.mark')) {
            try {
                //find empresa task
                $empresa_task = EmpresasTask::findOrFail($id);
                //related user task
                $task = Task::findOrFail($empresa_task->task_id);

                //update the status of enterprise task
                $empresa_task->task_status = EmpresasTask::STATUS_CANCELLED;
                $empresa_task->save();

                //Update the task entry
                $task->user_id_done = $this->auth->id;
                $task->status = "Cancelado";
                $task->progress = "100";
                $task->done_date = $task->today();
                $task->save();
                return response()->json(['msg' => 'Registro marcado como cancelado'], 200);
            } catch (QueryException $e) {
                return response()->json(['msg' => 'No se pudo encontrar el registro'], 202);
            }
        }
        return response()->json(['msg' => 'No tiene permisos para acceder a esta area.'], 203);
    }

    /**
     * Internal function
     * 
     * Function to create/update enterprise credit record
     * 
     * @param int $empresa_id id of the enterprise the credit belongs to
     * @param array $fields credit information fields
     * @param int/boolean $id id of the credit record in case of update otherwise false 
     */
    private function set_empresas_credito($empresa_id, array $fields, $id = false) {

        if ($id)
            $empresa_credit = $this->EmpresasCredito->findOrFail($id);
        else
            $empresa_credit = $this->EmpresasCredito;

        $fields['empresa'] = $empresa_id;

        $empresa_credit->fill($fields);

        $empresa_credit->save();
    }

    /**
     * Internal function
     * 
     * function to delete enterprise credit record
     * 
     * @param int $id ID of credit record
     */
    private function unset_empresas_credito($id) {

        $this->EmpresasCredito->findOrFail($id)->delete();
    }

    /**
     * Internal function
     * 
     * function for uploading an image to modules uploads folder
     */
    protected function uploadImage($image, $typeFile) {
        $time = Str::slug(Carbon::now());
        $rand = mt_rand(100, 999);
        $name = "";
        if (isset($image)) {
            $ext = $image->getClientOriginalExtension();
            $name = $typeFile . $rand . '_' . $time . '.' . $ext;
            $image->move(config('cuentascorporativas.uploads_dir').'empresa_logo', $name);
        }
        return $name;
    }

    /**
     * Internal function
     * 
     * Function to create the enterprise authentication task
     * 
     * @param type $enterprise_id
     * @return EmpresasAuthTask
     */
    private function createAuthorizationRequest($enterprise_id) {

        $task = Task::create([
                    'flow_id' => config('cuentascorporativas.id_executive_auth_wf'),
                    'name' => 'Aprobación de Nueva Empresa',
                    'start_date' => Carbon::today(),
                    'due_date' => Carbon::today()->addDays(2),
                    'status' => 'pending',
                    'progress' => '50',
                    'description' => 'Aprobar o Rechazar el registro de la nueva Empresa. <a href="' . route('empresas.show', $enterprise_id) . '">Ver Empresa aquí</a>'
        ]);

        $task->addRole(Rol::where('slug', 'gerente_cuentas_corporativas')->first()->getRoleId());

        $empesa_auth_task = EmpresasAuthTask::create([
                    'empresa_id' => $enterprise_id,
                    'task_id' => $task->id
        ]);

        return $empesa_auth_task;
    }

    /**
     * Internal function
     * 
     * Function to create the enterprise authentication notification
     * 
     * @param type $enterprise_id
     * @return int id of the notification created
     */
    private function createAuthorizationNotification($enterprise_id) {

        $notification = Notification::create([
                    'icon' => 'fa-envelope-o',
                    'name' => 'Aprobación de Nueva Empresa',
                    'description' => 'Aprobar o Rechazar el registro de la nueva Empresa.',
                    'url' => route('empresas.show', $enterprise_id)
        ]);

        $notification->addRole(Rol::where('slug', 'gerente_cuentas_corporativas')->first()->getRoleId());
        return $notification->id;
    }

}
