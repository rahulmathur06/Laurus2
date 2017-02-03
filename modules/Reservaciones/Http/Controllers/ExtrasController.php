<?php

namespace Modules\Reservaciones\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Reservaciones\Entities\Extra;
use Modules\Reservaciones\Http\Requests\ExtrasRequest;

class ExtrasController extends Controller {
        
    protected $Extras;

    public function __construct(Extra $extra) {
        $this->Extras = $extra;
    }

    public function index() {
        $extras = $this->Extras->all();
        return view('reservaciones::extras.index', compact('extras'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('reservaciones::extras.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExtrasRequest $request) {

        //fill valuses in model
        $this->Extras->fill($request->only('costo_mxn', 'costo_usd', 'incrementable', 'descripcion_esMX', 'descripcion_enUS', 'activo'));
        //save model
        $this->Extras->save();

        //success message 
        flash()->success('Creación exitosa.');
        //redirect to index
        return redirect('extras');
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
        $Extra = $this->Extras->findOrFail($id);
        return view('reservaciones::extras.edit', compact('Extra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ExtrasRequest $request, $id) {

        $extra = $this->Extras->findOrFail($id);
        //fill valuses in model
        $extra->fill($request->only('costo_mxn', 'costo_usd', 'incrementable', 'descripcion_esMX', 'descripcion_enUS', 'activo'));
        //save model
        $extra->save();
        // message
        flash()->success('Actualización exitosa.');

        return redirect('extras');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $Extra = $this->Extras->find($id);
            $Extra->destroy($id);
            return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
        } catch (QueryException $e) {
            return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
        }
    }

}
