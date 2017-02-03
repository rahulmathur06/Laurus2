<?php namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Database\QueryException;
use Modules\Reservaciones\Entities\AutoClases;
use Modules\Reservaciones\Entities\ClaseTraducciones;
use Modules\Reservaciones\Http\Requests\TraduccionClase;
use Pingpong\Modules\Routing\Controller;

class TraduccionesClasesController extends Controller {
	protected $traduccion;
	protected $clases;
	public function __construct(ClaseTraducciones $traduccion,AutoClases $clases){
		$this->clases = $clases;
		$this->traduccion = $traduccion;
	}

	public function index($id){
		$traducciones = $this->clases->find($id)->translate()->get();
		$clase_id = $id;
		return view('reservaciones::Autos.Clases.translate.index',compact('traducciones','clase_id'));
	}
	public function create($id){
		$clase_id = $id;
		$idioma = $this->traduccion->getIdioma();
		return view('reservaciones::Autos.Clases.translate.create',compact('clase_id','idioma'));
	}

	public function store(TraduccionClase $request){
		$exist = $this->traduccion->where('idioma',$request->get('idioma'))
			->where('clase_id',$request->get('clase_id'))->first();
		if($exist){
			flash()->error('Lo sentimos, esa traduccion ya existe.');
			return redirect()->route('clasetranslate.index',$request->get('clase_id'));
		}

		$this->traduccion->fill($request->all());
		$this->traduccion->save();

		flash()->success('Creación exitosa.');
		return redirect()->route('clasetranslate.index',$this->traduccion->clase_id);

	}

	public function edit($id){
		$traduccion = $this->traduccion->find($id);
		return view('reservaciones::Autos.Clases.translate.edit',compact('clase_id','traduccion'));
	}

	public function update(TraduccionClase $request,$id){


		$traduccion = $this->traduccion->find($id);
		$traduccion->fill($request->all());
		$traduccion->save();


		flash()->success('Actualización exitosa.');
		return redirect()->route('clasetranslate.index',$traduccion->clase_id);

	}

	public function destroy($id){
		try{
			$this->traduccion->destroy($id);
			return response()->json(['msg'=> 'Exito' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'Esta clase esta siendo usada'],202);
		}
	}


}