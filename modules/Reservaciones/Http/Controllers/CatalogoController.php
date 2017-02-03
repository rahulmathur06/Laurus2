<?php namespace Modules\Reservaciones\Http\Controllers;


use Illuminate\Database\QueryException;
use Modules\Reservaciones\Entities\Catalogo;
use Modules\Reservaciones\Entities\CatalogoTraduccion;
use Modules\Reservaciones\Http\Requests\CatalogoRequest;
use Modules\Reservaciones\Http\Requests\TraduccionCatalogoRequest;
use Pingpong\Modules\Routing\Controller;

class CatalogoController extends Controller {

	protected $catalogo;
	protected $traduccion;

	public function __construct(Catalogo $catalogo, CatalogoTraduccion $traduccion){
		$this->catalogo = $catalogo;
		$this->traduccion = $traduccion;
	}
	
	public function index(){
		$catalogos = $this->catalogo->all();
		return view('reservaciones::Seguros.Catalogo.index',compact('catalogos'));
	}

	public function create(){
		return view('reservaciones::Seguros.Catalogo.create');
	}

	public function store(CatalogoRequest $request){
		$this->catalogo->fill($request->only('clave'));
		$this->catalogo->save();
		// translate
		$traduccion = $this->traduccion->fill($request->only('nombre','idioma','descripcion'));
		$this->catalogo->translate()->save($traduccion);

		flash()->success('Creación exitosa.');
		return redirect()->to('catalogo');
	}

	public function edit($id){
		$catalogo = $this->catalogo->find($id);
		return view('reservaciones::Seguros.Catalogo.edit',compact('catalogo'));
	}

	public function update(CatalogoRequest $request, $id){
		$catalogo = $this->catalogo->find($id);
		$catalogo->fill($request->only('clave'));
		$catalogo->save();
		flash()->success('Actualización exitosa.');
		return redirect()->to('catalogo');
	}

	public  function destroy($id){
		try{
			$this->catalogo->destroy($id);
			return response()->json(['msg'=> 'el registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}
	}

	/**
	 * Translates catalogo
	 */
	public function indexTranslate($id){
		$traducciones = $this->catalogo->find($id)->translate()->get();
		$catalogo_id = $id;
		return view('reservaciones::Seguros.Catalogo.translate.index',compact('traducciones','catalogo_id'));
	}
	public function createTranslate($id){
		$catalogo_id = $id;
		$idioma = $this->traduccion->getIdioma();
		return view('reservaciones::Seguros.Catalogo.translate.create',compact('catalogo_id','idioma'));
	}

	public function storeTranslate(TraduccionCatalogoRequest $request){
		$exist = $this->traduccion->where('idioma',$request->get('idioma'))
			->where('catalogo_id',$request->get('catalogo_id'))->first();
		if($exist){
			flash()->error('Lo sentimos, esa traduccion ya existe.');
			return redirect()->route('catalogotranslate.index',$request->get('catalogo_id'));
		}

		$this->traduccion->fill($request->all());
		$this->traduccion->save();

		flash()->success('Creación exitosa.');
		return redirect()->route('catalogotranslate.index',$this->traduccion->catalogo_id);

	}

	public function editTranslate($id){
		$traduccion = $this->traduccion->find($id);
		return view('reservaciones::Seguros.Catalogo.translate.edit',compact('catalogo_id','traduccion'));
	}

	public function updateTranslate(TraduccionCatalogoRequest $request,$id){
		$traduccion = $this->traduccion->find($id);
		$traduccion->fill($request->all());
		$traduccion->save();


		flash()->success('Actualización exitosa.');
		return redirect()->route('catalogotranslate.index',$traduccion->catalogo_id);

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