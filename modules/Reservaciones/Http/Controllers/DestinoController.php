<?php namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Database\QueryException;
use Modules\Reservaciones\Entities\Destino;
use Modules\Reservaciones\Entities\DestinoTraducciones;
use Modules\Reservaciones\Entities\Estado;
use Modules\Reservaciones\Http\Requests\DestinoRequest;
use Modules\Reservaciones\Http\Requests\TraduccionDestinoRequest;
use Pingpong\Modules\Routing\Controller;


class DestinoController extends Controller {
	/**
	 * @var Destino
	 */
	protected $destino;
	/**
	 * @var DestinoTraducciones
	 */
	protected $traduccion;

	/**
	 * @param Destino $destino
	 * @param DestinoTraducciones $traduccion
	 */
	public function __construct(Destino $destino, DestinoTraducciones $traduccion){
		$this->destino = $destino;
		$this->traduccion = $traduccion;
	}
	public function index(){
		$destinos = $this->destino->all();
		return view('reservaciones::Destinos.index',compact('destinos'));
	}
	public function create(){
		$estados = Estado::all()->lists('nombre','id');
		return view('reservaciones::Destinos.create',compact('estados'));
	}
	public function store(DestinoRequest $request,TraduccionDestinoRequest $traduccion){
		$this->destino->fill($request->only('estado_id','nombre','orden'));
		$this->destino->save();
		// translate
		$traduccion = $this->traduccion->fill($traduccion->only('idioma','mensaje'));
		$this->destino->translate()->save($traduccion);
		flash()->success('Creación exitosa.');
		return redirect()->to('destino');
	}
	public function edit($id){
		$estados = Estado::all()->lists('nombre','id');
		$destino = $this->destino->find($id);

		return view('reservaciones::Destinos.edit',compact('destino','estados'));
	}

	public function update(DestinoRequest $request,$id){
		$destino = $this->destino->find($id);
		$destino->fill($request->only('estado_id','nombre','orden'));
		$destino->save();
		flash()->success('Actualización exitosa.');
		return redirect()->to('destino');
	}

	public  function destroy($id){
		try{
			$this->destino->destroy($id);
			return response()->json(['msg'=> 'el registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}
	}



	/**
	 * Translates destino
	 */
	public function indexTranslate($id){
		$traducciones = $this->destino->find($id)->translate()->get();
		$destino_id = $id;
		return view('reservaciones::Destinos.translate.index',compact('traducciones','destino_id'));
	}
	public function createTranslate($id){
		$destino_id = $id;
		$idioma = $this->traduccion->getIdioma();
		return view('reservaciones::Destinos.translate.create',compact('destino_id','idioma'));
	}

	public function storeTranslate(TraduccionDestinoRequest $request){
		$exist = $this->traduccion->where('idioma',$request->get('idioma'))
			->where('id_destino',$request->get('id_destino'))->first();
		if($exist){
			flash()->error('Lo sentimos, esa traduccion ya existe.');
			return redirect()->route('destinotranslate.index',$request->get('id_destino'));
		}

		$this->traduccion->fill($request->all());
		$this->traduccion->save();

		flash()->success('Creación exitosa.');
		return redirect()->route('destinotranslate.index',$this->traduccion->id_destino);

	}

	public function editTranslate($id){
		$traduccion = $this->traduccion->find($id);
		return view('reservaciones::Destinos.translate.edit',compact('id_destino','traduccion'));
	}

	public function updateTranslate(TraduccionDestinoRequest $request,$id){
		$traduccion = $this->traduccion->find($id);
		$traduccion->fill($request->all());
		$traduccion->save();
		flash()->success('Actualización exitosa.');
		return redirect()->route('destinotranslate.index',$traduccion->id_destino);
	}

	public  function destroyTranslate($id){
		try{
			$this->traduccion->destroy($id);
			return response()->json(['msg'=> 'el registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}
	}





}