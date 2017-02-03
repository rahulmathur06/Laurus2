<?php namespace Modules\Reservaciones\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Reservaciones\Entities\Cierres;
use Modules\Reservaciones\Http\Requests\CierresRequest;
use Modules\Reservaciones\Entities\AutoClases;
use Modules\Reservaciones\Entities\Locacion;

class CierresController extends Controller {
	
    protected $Cierres;

    public function __construct(Cierres $Cierres) {
        $this->Cierres = $Cierres;
    }
    
    public function index()
    {
        $cierres = $this->Cierres->join('mv3_locaciones_locacion as locacion', 'locacion.id', '=', 'mv3_reservaciones_cierres.locacion_id')
                ->join('mv3_autos_clases as clases', 'clases.id', '=', 'mv3_reservaciones_cierres.auto_id')
                ->select('mv3_reservaciones_cierres.*','locacion.clave','clases.clase')->get();
        return view('reservaciones::cierres.index',compact('cierres'));
    }
    
    public function create() {
        $autos = AutoClases::lists('clase','id');
        $locacion = Locacion::lists('clave','id');
        return view('reservaciones::cierres.create',compact('autos','locacion'));
    }
    
    public function store(CierresRequest $request) {
        //fill valuses in model
        $this->Cierres->fill($request->only('locacion_id','auto_id','fecha_ini','fecha_fin','motivo'));
        //save model
        $this->Cierres->save();
        flash()->success('Creación exitosa.');
        //redirect to index
        return redirect('cierres');
        
    }
    
    public function edit($id) {
        $cierres = $this->Cierres->select('mv3_reservaciones_cierres.*')->findOrFail($id);
        $autos = AutoClases::lists('clase','id');
        $locacion = Locacion::lists('clave','id');
        return view('reservaciones::cierres.edit',compact('cierres','autos','locacion'));
    }
    
     public function update(CierresRequest $request, $id) {

        $Cierres = $this->Cierres->findOrFail($id);
        $Cierres->fill($request->only('locacion_id','auto_id','fecha_ini','fecha_fin','motivo'));
        //save model
        $Cierres->save();
        flash()->success('Actualización exitosa.');
        return redirect('cierres');
    }
    
    public function show($id) {
        $cierres = $this->Cierres->join('mv3_locaciones_locacion as locacion', 'locacion.id', '=', 'mv3_reservaciones_cierres.locacion_id')
                ->join('mv3_autos_clases as clases', 'clases.id', '=', 'mv3_reservaciones_cierres.auto_id')
                ->select('mv3_reservaciones_cierres.*','locacion.clave','clases.clase')->findOrFail($id);
        return view('reservaciones::cierres.show',compact('cierres'));
    }
    
    public function destroy($id) {
        try {
            $Cierres = $this->Cierres->find($id);
            $Cierres->delete();
            return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
        } catch (QueryException $e) {
            return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
        }
    }
	
}