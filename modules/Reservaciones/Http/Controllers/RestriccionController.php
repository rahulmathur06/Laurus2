<?php

namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Modules\Reservaciones\Entities\HorariosRestriccion;
use Modules\Reservaciones\Entities\Locacion;
use Modules\Reservaciones\Entities\LocacionTraducciones;
use Modules\Reservaciones\Http\Requests\RestriccionRequest;
use PhpSpec\Exception\Exception;
use Pingpong\Modules\Routing\Controller;

class RestriccionController extends Controller {

    protected $restriccion;

    public function __construct(HorariosRestriccion $restriccion) {
        $this->restriccion = $restriccion;
    }

    public function index(Locacion $locacion) {
        $restricciones = $locacion->select('mv3_traducciones_locacion.nombre as name', 'mv3_locaciones_ciudad.nombre as ciudad', 'mv3_locaciones_locacion.id as locacion_id', 'mv3_horarios_restricciones.id as id')
                ->join('mv3_horarios_restricciones', 'mv3_locaciones_locacion.id', '=', 'mv3_horarios_restricciones.locacion_id')
                ->join('mv3_locaciones_ciudad', 'mv3_locaciones_locacion.ciudad_id', '=', 'mv3_locaciones_ciudad.id')
                ->join('mv3_traducciones_locacion', 'mv3_locaciones_locacion.id', '=', 'mv3_traducciones_locacion.locacion_id')
                ->where('mv3_traducciones_locacion.idioma', '=', 'es-MX')
                ->groupBy('name')
                ->get();
        return view('reservaciones::Horarios.Restricciones.index', compact('restricciones'));
    }

    public function create() {
        try {
            $locaciones = $this->restriccion->searchLocaciones();
        } catch (Exception $e) {
            flash()->warning($e->getMessage());
            return redirect()->to('restriccion');
        }

        return view('reservaciones::Horarios.Restricciones.create', compact('locaciones'));
    }

    public function store(RestriccionRequest $request) {
        
        $this->restriccion->fill($request->only('locacion_id', 'openMonday', 'closeMonday', 'openTuesday', 'closeTuesday', 'openWednesday', 'closeWednesday', 'openThursday', 'closeThursday', 'openFriday', 'closeFriday', 'openSaturday', 'closeSaturday', 'openSunday', 'closeSunday'));
        $this->restriccion->save();
        
        flash()->success('Creación exitosa');
        return redirect()->to('restriccion');
    }

    public function show($id) {
        
    }

    public function edit($id) {
        $restriccion = $this->restriccion->find($id);
        return view('reservaciones::Horarios.Restricciones.edit', compact('restriccion'));
    }

    public function update($id, RestriccionRequest $request) {
        $restriccion = $this->restriccion->findOrFail($id);
        $restriccion->fill($request->only('locacion_id', 'openMonday', 'closeMonday', 'openTuesday', 'closeTuesday', 'openWednesday', 'closeWednesday', 'openThursday', 'closeThursday', 'openFriday', 'closeFriday', 'openSaturday', 'closeSaturday', 'openSunday', 'closeSunday'));
        $restriccion->save();
        flash()->success('Actualización exitosa');
        return redirect()->route('restriccion.index');
    }

    public function destroy($id) {
        try {
            $this->restriccion->where('locacion_id', $id)->delete();
            return response()->json(['msg' => 'El registro se elimino exitosamente.'], 200);
        } catch (QueryException $e) {
            return response()->json(['msg' => 'Esta clase esta siendo usada'], 202);
        }
    }

}
