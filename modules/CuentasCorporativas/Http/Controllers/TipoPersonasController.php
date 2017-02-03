<?php

/**
 * Resource Controller 
 * 
 * This is the controller for module's "Types of Enterprise" option * 
 */

namespace Modules\CuentasCorporativas\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Modules\CuentasCorporativas\Entities\PersonasTipo;
use Modules\CuentasCorporativas\Http\Requests\TipoPersonasRequest;

class TipoPersonasController extends Controller {

    protected $auth;
    protected $PersonasTipo;

    public function __construct(PersonasTipo $PersonasTipo) {
        $this->auth = Sentinel::getUser();
        $this->PersonasTipo = $PersonasTipo;
    }

    public function index() {
        if (Sentinel::hasAccess('cuentascorporativas.config.personas.view')) {
            $PersonasTipos = $this->PersonasTipo->all();
            return view('cuentascorporativas::personasTipo.index',compact('PersonasTipos'));
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
        if (Sentinel::hasAccess('cuentascorporativas.config.personas.view')) {
            return view('cuentascorporativas::personasTipo.create');
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
    public function store(TipoPersonasRequest $request) {
        if (Sentinel::hasAccess('cuentascorporativas.config.personas.view')) {
            $fillable = $request->only('descripcion', 'sort_order');
            
            //Set order if empty or not set
            if(!trim($fillable['sort_order']))
                $fillable['sort_order'] = (int)$this->PersonasTipo->max('sort_order') + 1;
            //Fill entity
            $this->PersonasTipo->fill($fillable);
            //Save Entity
            $this->PersonasTipo->save();
            flash()->success('Creación exitosa.');
            return redirect('tipopersonas');
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
        if (Sentinel::hasAccess('cuentascorporativas.config.personas.view')) {
            $PersonasTipo = PersonasTipo::FindOrFail($id);
            return view('cuentascorporativas::personasTipo.edit', compact('PersonasTipo'));
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
    public function update(TipoPersonasRequest $request, $id) {
        if (Sentinel::hasAccess('cuentascorporativas.config.personas.view')) {
            $fillable = $request->only('descripcion', 'sort_order');;

            //Set order if empty or not set
            if(!trim($fillable['sort_order']))
                $fillable['sort_order'] = (int)$this->PersonasTipo->max('sort_order') + 1;
            
            $PersonasTipo = $this->PersonasTipo->find($id);
            // fill data
            $PersonasTipo->fill($fillable);
            // save Entity
            $PersonasTipo->save();
            // message
            flash()->success('Actualización exitosa.');

            return redirect('tipopersonas');
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
        if (Sentinel::hasAccess('cuentascorporativas.config.personas.view')) {
            try {
                $PersonasTipo = $this->PersonasTipo->find($id);
                $PersonasTipo->destroy($id);
                return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
            } catch (QueryException $e) {
                return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
            }
        }
        return response()->json(['msg' => 'No tiene permisos para acceder a esta area.'], 203);
    }

}
