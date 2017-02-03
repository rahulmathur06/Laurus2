<?php

namespace Modules\Flota\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Flota\Entities\FlotillaSiniestros;
use Modules\Flota\Entities\FlotillaPerdidaTotal;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Modules\Flota\Http\Requests\FueraServicioRequest;
use Modules\Flota\Http\Requests\PerdidaTotalRequest;
use Modules\Flota\Entities\Unidad;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class FueraServicioController extends Controller {

    protected $auth;
    protected $FlotillaSiniestros;

    public function __construct(FlotillaSiniestros $FlotillaSiniestros) {
        $this->auth = Sentinel::getUser();
        $this->FlotillaSiniestros = $FlotillaSiniestros;
    }

    public function index() {
        if (Sentinel::hasAccess('fueraservicio.index')) {
            $FlotillaSiniestros = FlotillaSiniestros::all();
            return view('flota::siniestros.index', compact('FlotillaSiniestros'));
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
        if (Sentinel::hasAccess('fueraservicio.create')) {
            //all availbale vehicle codes from flotilla_inventario table.
            //Model Modules\Flota\Entities\Unidad
            $claves = Unidad::lists('clave', 'id');

            // echo "<pre>";print_r($claves);die;
            //Name of All branches
            $sucursar = DB::table('Tb_Oficinas')->lists('nombre', 'clave');

            return view('flota::siniestros.create', compact('claves', 'sucursar'));
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
    public function store(FueraServicioRequest $request) {
        if (Sentinel::hasAccess('fueraservicio.create')) {
            $fillable = $request->only('clave', 'sucursal', 'numSiniestro', 'numReporte', 'inciso', 'poliza', 'tipo_siniestro', 'fecha_del_siniestro', 'comentarios', 'description');
            //No. of days from the accident
            $fillable['num_dias'] = Carbon::createFromFormat('Y-m-d', $fillable['fecha_del_siniestro'])->diff(new Carbon())->days;
            $this->FlotillaSiniestros->fill($fillable);
            $this->FlotillaSiniestros->save();
            flash()->success('Creación exitosa.');
            return redirect('fueraservicio');
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
        if (Sentinel::hasAccess('fueraservicio.update')) {
            //all availbale vehicle codes from flotilla_inventario table.
            //Model Modules\Flota\Entities\Unidad
            $claves = Unidad::lists('clave', 'id');
            //Name of all the cities from Tb_Plazas table
            $ciudad = DB::table('Tb_Plazas')->lists('Nombre', 'Clave');
            //Name of All branches
            $sucursar = DB::table('Tb_Oficinas')->lists('nombre', 'clave');
            //var_dump($claves);die;
            $fueraservicio = FlotillaSiniestros::FindOrFail($id);
            return view('flota::siniestros.edit', compact('fueraservicio', 'ciudad', 'claves', 'sucursar'));
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
    public function update(FueraServicioRequest $request, $id) {
        if (Sentinel::hasAccess('fueraservicio.update')) {
            $fillable = $request->only('clave', 'sucursal', 'numSiniestro', 'numReporte', 'inciso', 'poliza', 'tipo_siniestro', 'fecha_del_siniestro', 'comentarios', 'description');

            $FlotillaSiniestros = $this->FlotillaSiniestros->find($id);
            //No. of days from the accident
            $fillable['num_dias'] = Carbon::createFromFormat('Y-m-d', $fillable['fecha_del_siniestro'])->diff(new Carbon())->days;
            // fill data
            $FlotillaSiniestros->fill($fillable);
            // save flotilla
            $FlotillaSiniestros->save();
            // message
            flash()->success('Actualización exitosa.');

            return redirect('fueraservicio');
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
        if (Sentinel::hasAccess('fueraservicio.destroy')) {
            try {
                $FlotillaSiniestros = $this->FlotillaSiniestros->find($id);
                $FlotillaSiniestros->destroy($id);
                return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
            } catch (QueryException $e) {
                return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
            }
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    public function getCarcodeToDescription() {
        $carCode = $_REQUEST['carcode'];
        $desc = Unidad::select('marca', DB::raw('CONCAT(marca, " ", modelo, " ",color," Serie:",serie) AS full_name'))
                ->where('ID', $carCode)
                ->lists('full_name');
        return $desc;
    }

    public function moveToPerdidaTotal(PerdidaTotalRequest $request) {
        //var_dump($request);die;
        if (Sentinel::hasAccess('perdida.create')) {
            //Find the existing model for accident
            $FlotillaSiniestros = $this->FlotillaSiniestros->findOrFail($request->siniestro_id);
            
            //Fill the values to total loss
            $filleable = $request->only('clave', 'tipo_siniestro', 'sucursal', 'cliente', 'ciudad', 'comentarios', 'fecha_del_siniestro', 'tipo_siniestro', 'deducible', 'recuperacion', 'numReporte', 'cobertura', 'num_contrato', 'contrato_inicio', 'contrato_fin', 'description');
            $FlotillaPerdidaTotal = new FlotillaPerdidaTotal;
            $FlotillaPerdidaTotal->fill($filleable);
            //saving the total loss entry
            $FlotillaPerdidaTotal->save();
            
            //Delete the moved record drom previous position
            $FlotillaSiniestros->destroy($request->siniestro_id);
            
            $response = new \stdClass();
            $response->success = true;
            $response->msg = 'Creación exitosa.';
            echo json_encode($response);die;
        }

        $response = new \stdClass();
        $response->success = false;
        $response->msg = 'No tiene permisos para acceder a esta area.';
        echo json_encode($response);die;
    }

}
