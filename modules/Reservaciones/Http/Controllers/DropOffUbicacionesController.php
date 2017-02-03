<?php

namespace Modules\Reservaciones\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Reservaciones\Entities\DropOffUbicacion;
use Illuminate\Support\Facades\DB;
use Modules\Reservaciones\Http\Requests\DropOffUbicacionesRequest;
use Modules\Reservaciones\Entities\Locacion;
use Illuminate\Support\Facades\Request;
use Illuminate\Database\QueryException;

class DropOffUbicacionesController extends Controller {

    protected $Ubicaciones;

    public function __construct(DropOffUbicacion $ubicacion) {
        $this->Ubicaciones = $ubicacion;
    }

    public function index() {
        $ubicaciones = $this->Ubicaciones->all();
        return view('reservaciones::dropoff.ubicaciones.index', compact('ubicaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $locaciones = ['' => 'Seleccione una Ubicación'] + DB::table('mv3_locaciones_locacion as location')
                        ->join('mv3_traducciones_locacion as translation', 'location.id', '=', 'translation.locacion_id')
                        ->where('translation.idioma', '=', 'es-MX')
                        ->lists('translation.nombre', 'translation.locacion_id');

        return view('reservaciones::dropoff.ubicaciones.create', compact('locaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DropOffUbicacionesRequest $request) {
//fill valuses in model
        $this->Ubicaciones->fill($request->only('ciudad_pickup_id', 'ciudad_dropoff_id'));
        $this->Ubicaciones->distancia = $request->distancia ?: $request->distancia_calc;
//save model
        $this->Ubicaciones->save();

//success message 
        flash()->success('Creación exitosa.');
//redirect to index
        return redirect('ubicaciones');
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
        $locaciones = ['' => 'Seleccione una Ubicación'] + DB::table('mv3_locaciones_locacion as location')
                        ->join('mv3_traducciones_locacion as translation', 'location.id', '=', 'translation.locacion_id')
                        ->where('translation.idioma', '=', 'es-MX')
                        ->lists('translation.nombre', 'translation.locacion_id');
        $Ubicacion = $this->Ubicaciones->findOrFail($id);
        return view('reservaciones::dropoff.ubicaciones.edit', compact('Ubicacion', 'locaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DropOffUbicacionesRequest $request, $id) {

        $ubicacion = $this->Ubicaciones->findOrFail($id);
//fill valuses in model
        $ubicacion->fill($request->only('ciudad_pickup_id', 'ciudad_dropoff_id'));
        $ubicacion->distancia = $request->distancia ?: $request->distancia_calc;
//save model
        $ubicacion->save();
// message
        flash()->success('Actualización exitosa.');

        return redirect('ubicaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $Ubicacion = $this->Ubicaciones->find($id);
            $Ubicacion->destroy($id);
            return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
        } catch (QueryException $e) {
            return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
        }
    }

    public function getPosition() {
        try {
            $location = Locacion::find(Request::all()['id']);
            if ($location->latitud && $location->longitud)
                return response()->json(['lat' => $location->latitud, 'long' => $location->longitud, 'success' => true, 'msg' => 'Coordenadas recuperadas'], 200);
            else
                return response()->json(['msg' => 'No se pueden encontrar coordenadas', 'success' => false], 202);
        } catch (QueryException $e) {
            return response()->json(['msg' => 'No se pueden encontrar coordenadas', 'success' => false], 202);
        }
    }

}
