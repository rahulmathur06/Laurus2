<?php

namespace Modules\Reservaciones\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Reservaciones\Entities\PromoLocacion;
use Modules\Reservaciones\Entities\PromoLocacionClase;
use Modules\Reservaciones\Http\Requests\PromoLocacionRequest;
use Modules\Reservaciones\Entities\PromoListado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class PromoAssignmentController extends Controller {

    protected $PromoLocacion;

    public function __construct(PromoLocacion $promo_locacion) {
        $this->PromoLocacion = $promo_locacion;
    }

    public function index() {
        $promolocaciones = $this->PromoLocacion
                ->join('mv3_traducciones_locacion as location', 'location.locacion_id', '=', 'mv3_promo_locacion.locacion_id')
                ->join('mv3_promo_listado as promo', 'promo.id', '=', 'mv3_promo_locacion.promo_id')
                ->select('location.nombre as locacion', 'promo.descripcion as promocion', 'mv3_promo_locacion.id as id')
                ->where('location.idioma', '=', 'es-MX')
                ->get();
        return view('reservaciones::promo_locacion.index', compact('promolocaciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $promos = PromoListado::lists('descripcion', 'id');
        $locaciones = DB::table('mv3_traducciones_locacion as location')
                ->where('location.idioma', '=', 'es-MX')
                ->lists('location.nombre', 'location.locacion_id');
        return view('reservaciones::promo_locacion.create', compact('promos', 'locaciones'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromoLocacionRequest $request) {
        //fill valuses in model
        $this->PromoLocacion->fill($request->only('locacion_id', 'promo_id'));
        //save model
        $this->PromoLocacion->save();
        //save dependent model
        $PromoLocacionClases = [];
        foreach($request->clases as $index => $clase_id){
            $PromoLocacionClases[] = ['loc_pom_id' => $this->PromoLocacion->id, 'clase_id' => $clase_id];
        }
        PromoLocacionClase::insert($PromoLocacionClases);
        //success message 
        flash()->success('Creación exitosa.');
        //redirect to index
        return redirect('promo-locaciones');
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
        $PromoLocacion = $this->PromoLocacion->findOrFail($id);
        $promos = PromoListado::lists('descripcion', 'id');
        $locaciones = DB::table('mv3_traducciones_locacion as location')
                ->where('location.idioma', '=', 'es-MX')
                ->lists('location.nombre', 'location.locacion_id');
        return view('reservaciones::promo_locacion.edit', compact('PromoLocacion', 'promos', 'locaciones'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromoLocacionRequest $request, $id) {

        $PromoLocacion = $this->PromoLocacion->findOrFail($id);
        //fill valuses in model
        $PromoLocacion->fill($request->only('locacion_id', 'promo_id'));
        //save model
        $PromoLocacion->save();
        //delete old entries
        $PromoLocacion->clases()->delete();
        //save dependent model
        $PromoLocacionClases = [];
        foreach($request->clases as $index => $clase_id){
            $PromoLocacionClases[] = ['loc_pom_id' => $id, 'clase_id' => $clase_id];
        }
        PromoLocacionClase::insert($PromoLocacionClases);
        //success message 
        flash()->success('Actualización exitosa.');
        //redirect to index
        return redirect('promo-locaciones');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $PromoLocacion = $this->PromoLocacion->find($id);
            $PromoLocacion->clases()->delete();
            $PromoLocacion->destroy($id);
            return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
        } catch (QueryException $e) {
            return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
        }
    }

    public function getClases() {
        $locacion_id = Request::input('locacion_id');
        $promo_locacion_id = Request::input('id');
        if((int)$promo_locacion_id)
            $promo_locacion_clases = $this->PromoLocacion->findOrFail($promo_locacion_id)->clases->lists('clase_id')->toArray();
        else
            $promo_locacion_clases = array();
        $clases = DB::table('mv3_locaciones_autos as autos')
                ->join('mv3_traducciones_clases as clases', 'clases.clase_id', '=', 'autos.clase_id')
                ->where([
                        'autos.locacion_id' => $locacion_id,
                        'clases.idioma' => 'es-MX'
                        ])
                ->select('clases.nombre as nombre', 'clases.clase_id as id')
                ->lists('nombre', 'id');
        return view('reservaciones::promo_locacion.partials.clases', compact('clases', 'promo_locacion_clases')); 
    }

}
