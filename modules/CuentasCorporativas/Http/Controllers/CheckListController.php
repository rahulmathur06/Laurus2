<?php

namespace Modules\CuentasCorporativas\Http\Controllers;

use DB;
use Input;
use Illuminate\Http\Request;
use Modules\User\Entities\User;
use Modules\CuentasCorporativas\Entities\Checklist;
use Modules\CuentasCorporativas\Http\Requests\CheckListRequest;
use Pingpong\Modules\Routing\Controller;
use Cartalyst\Sentinel\Native\Facades\Sentinel;

class CheckListController extends Controller {

    /**
     * @var checklist
     */
    protected $checklist;

    /**
     * @var auth user
     */
    protected $auth;

    /**
     * @param agreement $model
     */
    public function __construct(Checklist $checklist) {

        $this->auth = Sentinel::getUser();
        $this->checklist = $checklist;
    }

    public function index() {

        if (Sentinel::hasAccess('cuentascorporativas.config.checklist.view')) {
            $checklist = Checklist::
                    Join('personas_tipos', 'personas_tipos.id', '=', 'convenios_checklist.tipo_persona_id')
                    ->Join('convenio_tipo', 'convenio_tipo.id', '=', 'convenios_checklist.tipo_convenio_id')
                    ->select('convenios_checklist.*', 'personas_tipos.descripcion as persion_desc', 'convenio_tipo.descripcion as convention_desc')
                    ->get();
            //echo "<pre>";print_r($checklist);die;
            return view('cuentascorporativas::checklist.index', compact('checklist'));
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    public function create() {
        if (Sentinel::hasAccess('cuentascorporativas.config.checklist.view')) {
            $tipo_person = DB::table('personas_tipos')->orderBy('sort_order', 'asc')->lists('descripcion', 'id');
            $tipo_convention = DB::table('convenio_tipo')->orderBy('sort_order', 'asc')->lists('descripcion', 'id');
            return view('cuentascorporativas::checklist.create', compact('tipo_convention', 'tipo_person'));
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    public function store(CheckListRequest $request) {
        $input = Input::all();
        $requerido = 0;
        $validar_fecha = 0;
        if (Sentinel::hasAccess('cuentascorporativas.config.checklist.view')) {
            $filleable = $request->only('documento', 'tipo_persona_id', 'tipo_convenio_id', 'orden');
            $filleable['requerido'] = isset($request->requerido) ?: 0;
            $filleable['validar_fecha'] = isset($request->validar_fecha) ?: 0;
            $this->checklist->fill($filleable);
            $this->checklist->save();
            flash()->success('Creación exitosa.');
            return redirect()->to('checklist');
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    public function edit($id) {
        if (Sentinel::hasAccess('cuentascorporativas.config.checklist.view')) {
            $checklist = $this->checklist->find($id);
            $tipo_person = DB::table('personas_tipos')->orderBy('sort_order', 'asc')->lists('descripcion', 'id');
            $tipo_convention = DB::table('convenio_tipo')->orderBy('sort_order', 'asc')->lists('descripcion', 'id');
            return view('cuentascorporativas::checklist.edit', compact('checklist', 'tipo_convention', 'tipo_person'));
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    public function update(CheckListRequest $request, $id) {
        if (Sentinel::hasAccess('cuentascorporativas.config.checklist.view')) {
            $filleable = $request->only('documento', 'tipo_persona_id', 'tipo_convenio_id', 'orden', 'requerido', 'validar_fecha');
            // search checklist
            $checklist = $this->checklist->find($id);

            // fill data
            $checklist->fill($filleable);
            // save checklist
            $checklist->save();

            // message
            flash()->success('Actualización exitosa.');
            return redirect()->to('checklist');
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Sentinel::hasAccess('cuentascorporativas.config.checklist.view')) {
            try {
                $checklist = $this->checklist->find($id);
                $checklist->destroy($id);
                return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
            } catch (QueryException $e) {
                return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
            }
        }
        return response()->json(['msg' => 'No tiene permisos para acceder a esta area.'], 203);
    }

}
