<?php namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Database\QueryException;
use Modules\Reservaciones\Entities\TarifasMinmax;
use Modules\Reservaciones\Http\Requests\TarifasMinmaxRequest;
use Pingpong\Modules\Routing\Controller;
use DB,Response,Input;

class RangosController extends Controller {

	public function __construct(TarifasMinmax $TarifasMinmax ){
		$this->TarifasMinmax = $TarifasMinmax;
	}
	
	public function index(){
		$TarifasMinmax = $this->TarifasMinmax
				->join('mv3_traducciones_locacion','mv3_traducciones_locacion.locacion_id','=','mv3_tarifas_minmax.locacion_id')
				->join('mv3_autos_clases','mv3_autos_clases.id','=','mv3_tarifas_minmax.autos_clases_id')
				->orderBy('mv3_tarifas_minmax.id','DESC')
				->select('mv3_tarifas_minmax.*','mv3_traducciones_locacion.nombre as location','mv3_autos_clases.clase')
				->get();
		return view('reservaciones::Rangos.index',compact('TarifasMinmax'));
	}

	public function create(){
            try {
            $location = $this->TarifasMinmax->searchLocaciones();
            } catch (Exception $e) {
                flash()->warning($e->getMessage());
                return redirect()->to('rangos');
            }
            return view('reservaciones::Rangos.create',compact('location'));
	}

	public function store(TarifasMinmaxRequest $request){
		$input = Input::all();
		foreach ($input['autos_clases_id'] as $key => $value) {
			$trafixMInMax = new TarifasMinmax;
            $trafixMInMax->autos_clases_id = $key;
			$trafixMInMax->locacion_id = $input['locacion_id'];
			$trafixMInMax->min_precio  = $input['min_precio'][$key];
			$trafixMInMax->max_precio  = $input['max_precio'][$key];
			$trafixMInMax->save();
		}
		flash()->success('Creación exitosa.');
		return redirect()->to('rangos');
	}

	public function edit($id){
		$location = DB::table('mv3_traducciones_locacion')->lists('nombre','locacion_id');
		$clase = $this->TarifasMinmax->find($id);
		return view('reservaciones::Rangos.edit',compact('clase','location'));
	}

	public function update(TarifasMinmaxRequest $request, $id){
		$input = Input::all();
		foreach ($input['autos_clases_id'] as $key => $value) {
			$filleable = $request->only('locacion_id');
            $filleable['autos_clases_id'] = $key;
			$filleable['min_precio'] = $input['min_precio'][$key];
			$filleable['max_precio'] = $input['max_precio'][$key];
			$TarifasMinmax = $this->TarifasMinmax->find($id);
			$TarifasMinmax->fill($filleable);
			$TarifasMinmax->save();
		}
		flash()->success('Actualización exitosa.');
		return redirect()->to('rangos');
	}

	public function destroy($id){
		try{
			$this->TarifasMinmax->destroy($id);
			return response()->json(['msg'=> 'Tarifas Mínimas Y Máximas  exitosamente.' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'Tarifas Mínimas Y Máximas  usada'],202);
		}
	}
	public function getLocationToCars()
	{
            $locationID = $_REQUEST['locationID'];
            $type = $_REQUEST['type'];
            if($type == 'up'){
                    $tarifasID = $_REQUEST['tarifasID'];
                    $claseID = DB::table('mv3_tarifas_minmax')
                    ->where('mv3_tarifas_minmax.id',$tarifasID)
                    ->join('mv3_traducciones_clases','mv3_traducciones_clases.clase_id','=','mv3_tarifas_minmax.autos_clases_id')
                    ->select('mv3_tarifas_minmax.*','mv3_traducciones_clases.clase_id','mv3_traducciones_clases.nombre')
                    ->get();
                }else{
                    $claseID = DB::table('mv3_locaciones_autos')
                            ->where('mv3_locaciones_autos.locacion_id', $locationID)
                            ->join('mv3_traducciones_clases','mv3_traducciones_clases.clase_id','=','mv3_locaciones_autos.clase_id')
                            ->select('mv3_traducciones_clases.clase_id','mv3_traducciones_clases.nombre')
                            ->get();
                }
            $desc = view('reservaciones::Rangos.partials.location_car',compact('claseID'));
        return $desc;
	}

}