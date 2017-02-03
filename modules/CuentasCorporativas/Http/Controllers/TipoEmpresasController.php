<?php

/**
 * Resource Controller 
 * 
 * This is the controller for module's "Types of Enterprise" option * 
 */

namespace Modules\CuentasCorporativas\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Modules\CuentasCorporativas\Entities\EmpresasTipo;
use Modules\CuentasCorporativas\Http\Requests\TipoEmpresasRequest;

class TipoEmpresasController extends Controller {

    protected $auth;
    protected $EmpresasTipo;

    public function __construct(EmpresasTipo $EmpresasTipo) {
        $this->auth = Sentinel::getUser();
        $this->EmpresasTipo = $EmpresasTipo;
    }

    public function index() {
        if (Sentinel::hasAccess('cuentascorporativas.config.empresas.view')) {
            $EmpresasTipos = $this->EmpresasTipo->all();
            return view('cuentascorporativas::empresasTipo.index',compact('EmpresasTipos'));
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
        if (Sentinel::hasAccess('cuentascorporativas.config.empresas.view')) {
            return view('cuentascorporativas::empresasTipo.create');
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
    public function store(TipoEmpresasRequest $request) {
        if (Sentinel::hasAccess('cuentascorporativas.config.empresas.view')) {
            $fillable = $request->only('descripcion', 'sort_order');
            
            //Set order if empty or not set
            if(!trim($fillable['sort_order']))
                $fillable['sort_order'] = (int)$this->EmpresasTipo->max('sort_order') + 1;
            //Fill entity
            $this->EmpresasTipo->fill($fillable);
            //Save Entity
            $this->EmpresasTipo->save();
            flash()->success('Creación exitosa.');
            return redirect('tipoempresas');
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
        if (Sentinel::hasAccess('cuentascorporativas.config.empresas.view')) {
            $EmpresasTipo = EmpresasTipo::FindOrFail($id);
            return view('cuentascorporativas::empresasTipo.edit', compact('EmpresasTipo'));
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
    public function update(TipoEmpresasRequest $request, $id) {
        if (Sentinel::hasAccess('cuentascorporativas.config.empresas.view')) {
            $fillable = $request->only('descripcion', 'sort_order');;

            //Set order if empty or not set
            if(!trim($fillable['sort_order']))
                $fillable['sort_order'] = (int)$this->EmpresasTipo->max('sort_order') + 1;
            
            $EmpresasTipo = $this->EmpresasTipo->find($id);
            // fill data
            $EmpresasTipo->fill($fillable);
            // save Entity
            $EmpresasTipo->save();
            // message
            flash()->success('Actualización exitosa.');

            return redirect('tipoempresas');
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
        if (Sentinel::hasAccess('cuentascorporativas.config.empresas.view')) {
            try {
                $EmpresasTipo = $this->EmpresasTipo->find($id);
                $EmpresasTipo->destroy($id);
                return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
            } catch (QueryException $e) {
                return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
            }
        }
        return response()->json(['msg' => 'No tiene permisos para acceder a esta area.'], 203);
    }

}
