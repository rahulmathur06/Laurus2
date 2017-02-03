<?php

namespace Modules\Reservaciones\Http\Controllers;

use DB;
use Input;
use Pingpong\Modules\Routing\Controller;
use Modules\Reservaciones\Entities\DropOffCosto;
use Modules\Reservaciones\Http\Requests\DropOffCostosRequest;

class DropOffCostosController extends Controller {

    protected $Costos;

    public function __construct(DropOffCosto $costo) {
        $this->Costos = $costo;
    }

    public function index() {
        $costos = $this->Costos->all();
        return view('reservaciones::dropoff.costos.index', compact('costos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('reservaciones::dropoff.costos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DropOffCostosRequest $request) {
        //fill valuses in model
        $this->Costos->fill($request->only('fecha_ini', 'fecha_fin', 'valor_mxn', 'valor_usd'));
        //save model
        $this->Costos->save();
        //success message 
        flash()->success('Creación exitosa.');
        //redirect to index
        return redirect('dropoffcostos');
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
        $Costo = $this->Costos->findOrFail($id);
        return view('reservaciones::dropoff.costos.edit', compact('Costo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DropOffCostosRequest $request, $id) {

        $costo = $this->Costos->findOrFail($id);
        //fill valuses in model
        $costo->fill($request->only('fecha_ini', 'fecha_fin', 'valor_mxn', 'valor_usd'));
        //save model
        $costo->save();
        // message
        flash()->success('Actualización exitosa.');

        return redirect('dropoffcostos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $Costo = $this->Costos->find($id);
            $Costo->destroy($id);
            return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
        } catch (QueryException $e) {
            return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
        }
    }

}
