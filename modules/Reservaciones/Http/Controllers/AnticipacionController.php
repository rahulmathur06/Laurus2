<?php namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Modules\Reservaciones\Entities\AutoClases;
use Modules\Reservaciones\Entities\ClaseTraducciones;
use Modules\Reservaciones\Entities\HorariosAnticipacion;
use Modules\Reservaciones\Entities\Locacion;
use Modules\Reservaciones\Entities\LocacionTraducciones;
use Modules\Reservaciones\Http\Requests\AnticipacionRequest;
use Pingpong\Modules\Routing\Controller;

class AnticipacionController extends Controller {


	protected $Anticipacion;

	public function __construct(HorariosAnticipacion $Anticipacion){
		$this->Anticipacion = $Anticipacion;
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function index(){
		$anticipaciones = $this->Anticipacion->all();
		return view('reservaciones::Horarios.Anticipacion.index',compact('anticipaciones'));
	}

	public function create(){
		$locaciones = Locacion::select(DB::raw('CONCAT(mv3_traducciones_locacion.nombre, " - " , mv3_locaciones_ciudad.nombre) as full_name'),'mv3_locaciones_locacion.id as id')
					->join('mv3_locaciones_ciudad','mv3_locaciones_locacion.ciudad_id','=','mv3_locaciones_ciudad.id')
					->join('mv3_traducciones_locacion','mv3_locaciones_locacion.id','=','mv3_traducciones_locacion.locacion_id')
					->where('mv3_traducciones_locacion.idioma','=','es-MX')
				    ->lists('full_name','id');
                
		$clases = $this->getClases($locaciones->keys()->first(), 'list');
		if(count($locaciones) < 1){
			flash()->warning('Primero necesita crear oficinas.');
			return redirect()->to('locacion');
		}
		return view('reservaciones::Horarios.Anticipacion.create',compact('locaciones','clases'));
	}

	public function store(AnticipacionRequest $request){
		$count = $this->Anticipacion->where('locacion_id',$request->get('locacion_id'))->where('clase_id',$request->get('clase_id'))->first();
		if($count != null ){
			return redirect()->back()->withErrors(['La combinacion de locación y clase que usted eligio ya existe, favor de seleccionar otra.']);
		}

		$this->Anticipacion->fill($request->only('locacion_id','clase_id','min_tiempo'));
		$this->Anticipacion->save();

		flash()->success('Creación exitosa.');
		return redirect()->to('anticipacion');
	}

	public function edit($id){
		$anticipacion = $this->Anticipacion->findOrFail($id);
		$locaciones = LocacionTraducciones::where('idioma','es-MX')->lists('nombre','locacion_id');
		$clases = $this->getClases($anticipacion->locacion_id, 'list');
		return view('reservaciones::Horarios.Anticipacion.edit',compact('anticipacion','locaciones','clases'));
	}

	public function update(AnticipacionRequest $request,$id){
		$Anticipacion = $this->Anticipacion->find($id);
		$Anticipacion->fill($request->only('min_tiempo'));
		$Anticipacion->save();
		flash()->success('Actualización exitosa.');
		return redirect()->to('anticipacion');


	}

	public function destroy($id){
		try{
			$this->Anticipacion->destroy($id);
			return response()->json(['msg'=> 'El registro se elimino exitosamente.' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'Esta clase esta siendo usada'],202);
		}
	}


	public function getClases($id, $format = 'json'){
		$clases = Locacion::join('mv3_locaciones_autos','mv3_locaciones_locacion.id','=','mv3_locaciones_autos.locacion_id')
			->join('mv3_autos_clases','mv3_locaciones_autos.clase_id','=','mv3_autos_clases.id')
			->join('mv3_traducciones_clases','mv3_traducciones_clases.clase_id','=','mv3_autos_clases.id')
			->where('mv3_locaciones_locacion.id','=',$id)
			->where('mv3_traducciones_clases.idioma','=','es-MX')
			->select('mv3_traducciones_clases.nombre','mv3_autos_clases.id');
		
                switch($format){
                    case 'json':
                        return $clases->get()->toJson();
                    case 'list':
                        return $clases->lists('nombre','id');
                }

	}
}