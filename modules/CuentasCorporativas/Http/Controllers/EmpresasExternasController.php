<?php

/**
 * EmpresasExternasController
 * 
 * This is the controller for module's "Types of Empresas" option * 
 */

namespace Modules\CuentasCorporativas\Http\Controllers;

use Modules\Roles\Entities\Rol;
use Pingpong\Modules\Routing\Controller;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Modules\CuentasCorporativas\Entities\EmpresasExternas;
use Modules\CuentasCorporativas\Entities\EmpresasExternasCredito;
use Modules\CuentasCorporativas\Http\Requests\EmpresasExternasRequest;
use Modules\CuentasCorporativas\Http\Requests\EmpresasExternasEditRequest;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class EmpresasExternasController extends Controller {

    protected $auth;
    protected $Empresas;
    protected $EmpresasCredito;

    public function __construct(EmpresasExternas $Empresas, EmpresasExternasCredito $EmpresasCredito) {
        $this->auth = Sentinel::getUser();
        $this->Empresas = $Empresas;
        $this->EmpresasCredito = $EmpresasCredito;
    }

    public function index() {
        if (Sentinel::hasAccess('cuentascorporativas.empresas.externas.view')) {
            $Empresas = $this->Empresas->all();
            return view('cuentascorporativas::empresasExternas.index', compact('Empresas'));
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        if (Sentinel::hasAccess('cuentascorporativas.empresas.externas.view')) {
            $requireCredit = false;
            $estados = DB::table('Mexico_Estados')->lists('NOMBRE', 'ID');
            $ciudades = DB::table('Mexico_Ciudades')->where('Estado_ID', 1)->lists('NOMBRE', 'NOMBRE');
            $empresas = $this->Empresas->lists('nombre', 'id')->prepend('Ninguono', 0);
            $ejecutivas = Rol::where('slug', 'cuentas_corporativas_externo')->first()->users()->lists('first_name', 'id');
            return view('cuentascorporativas::empresasExternas.create', compact('requireCredit', 'estados', 'empresas', 'ejecutivas', 'ciudades'));
        }

        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmpresasExternasRequest $request) {
        
        if (Sentinel::hasAccess('cuentascorporativas.empresas.externas.view')) {
            $fillable = $request->only('rfc', 'razon_social', 'nombre', 'empresas_codigo', 'direccion_calle', 'direccion_ciudad', 'direccion_colonia', 'direccion_municipio', 'direccion_estado', 'direccion_codigo_postal', 'telefono1', 'telefono2', 'fax', 'email', 'empresaPadre', 'ejecutiva_id', 'representante', 'comentarios', 'depto_contabilidad', 'depto_contabilidad_email', 'depto_compras', 'depto_compras_email', 'giro', 'numero_empleados');
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

            flash()->success('Creación exitosa.');
            return redirect('empresasExternas');
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        if (Sentinel::hasAccess('cuentascorporativas.empresas.externas.view')) {
            $Empresa = $this->Empresas->FindOrFail($id);
            $estados = DB::table('Mexico_Estados')->lists('NOMBRE', 'ID');
            $ciudades = DB::table('Mexico_Ciudades')->where('Estado_ID', $Empresa->direccion_estado)->lists('NOMBRE', 'NOMBRE');
            $empresas = $this->Empresas->where('id', '!=', $id)->lists('nombre', 'id')->prepend('Ninguono', 0);
            $ejecutivas = Rol::where('slug', 'cuentas_corporativas_externo')->first()->users()->lists('first_name', 'id');
            $EmpresaCredito = $Empresa->credit;
            $requireCredit = (bool) $Empresa->credit;
            return view('cuentascorporativas::empresasExternas.edit', compact('Empresa', 'requireCredit', 'EmpresaCredito', 'estados', 'empresas', 'ejecutivas', 'ciudades'));
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresasExternasEditRequest $request, $id) {
        if (Sentinel::hasAccess('cuentascorporativas.empresas.externas.view')) {
            $fillable = $request->only('rfc', 'razon_social', 'nombre', 'empresas_codigo', 'logo', 'direccion_calle', 'direccion_ciudad', 'direccion_colonia', 'direccion_municipio', 'direccion_estado', 'direccion_codigo_postal', 'telefono1', 'telefono2', 'fax', 'email', 'empresaPadre', 'ejecutiva_id', 'representante', 'comentarios', 'depto_contabilidad', 'depto_contabilidad_email', 'depto_compras', 'depto_compras_email', 'giro', 'numero_empleados');

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

            return redirect('empresasExternas');
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
        if (Sentinel::hasAccess('cuentascorporativas.empresas.externas.view')) {
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

}
