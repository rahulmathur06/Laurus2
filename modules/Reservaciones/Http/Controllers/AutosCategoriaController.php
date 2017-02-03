<?php namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Database\QueryException;
use Modules\Reservaciones\Entities\AutoCategoria;
use Modules\Reservaciones\Entities\AutoCategoriaTraduccion;
use Modules\Reservaciones\Http\Requests\AutoCategoriaRequest;
use Modules\Reservaciones\Http\Requests\TraduccionAutoCategoria;
use Pingpong\Modules\Routing\Controller;
use Response;


class AutosCategoriaController extends Controller {

	protected $categoria;
	protected $traduccion;

	public function __construct(AutoCategoria $categoria, AutoCategoriaTraduccion $traduccion){
		$this->categoria = $categoria;
		$this->traduccion = $traduccion;

	}
	
	public function index(){
		$categorias = $this->categoria->all();
		return view('reservaciones::Autos.Categorias.index',compact('categorias'));
	}

	public function create(){
		return view('reservaciones::Autos.Categorias.create');
	}
	public function store(AutoCategoriaRequest $request){
		$this->categoria->save();
		// translate
		$traduccion = $this->traduccion->fill($request->only('idioma','nombre'));
		$this->categoria->translate()->save($traduccion);
		//return
		flash()->success('Creación exitosa.');
		return redirect()->to('categorias');
	}

	/*public function edit($id){
		$categoria = $this->categoria->find($id);
		return view('reservaciones::Autos.Categorias.edit',compact('categoria'));
	}
	public function update(AutoCategoriaRequest $request, $id){
		$categoria = $this->categoria->find($id);
		$categoria->fill($request->all());
		$categoria->save();

		flash()->success('Acutalización exitosa.');
		return redirect()->to('categorias');

	}*/

	public function destroy($id){
		try{
			$this->categoria->destroy($id);
			return response()->json(['msg'=> 'Exito' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'Esta categoria esta asignada a una clase.'],202);
		}
	}


	/**
	 * Translates categoria
	 */
	public function indexTranslate($id){
		$traducciones = $this->categoria->find($id)->translate()->get();
		$categoria_id = $id;
		return view('reservaciones::Autos.Categorias.translate.index',compact('traducciones','categoria_id'));
	}
	public function createTranslate($id){
		$categoria_id = $id;
		$idioma = $this->traduccion->getIdioma();
		return view('reservaciones::Autos.Categorias.translate.create',compact('categoria_id','idioma'));
	}

	public function storeTranslate(TraduccionAutoCategoria $request){
		$exist = $this->traduccion->where('idioma',$request->get('idioma'))
			->where('categoria_id',$request->get('categoria_id'))->first();
		if($exist){
			flash()->error('Lo sentimos, esa traduccion ya existe.');
			return redirect()->route('categoriatranslate.index',$request->get('categoria_id'));
		}

		$this->traduccion->fill($request->all());
		$this->traduccion->save();

		flash()->success('Creación exitosa.');
		return redirect()->route('categoriatranslate.index',$this->traduccion->categoria_id);

	}

	public function editTranslate($id){
		$traduccion = $this->traduccion->find($id);
		return view('reservaciones::Autos.Categorias.translate.edit',compact('categoria_id','traduccion'));
	}

	public function updateTranslate(TraduccionAutoCategoria $request,$id){
		$traduccion = $this->traduccion->find($id);
		$traduccion->fill($request->all());
		$traduccion->save();
		flash()->success('Actualización exitosa.');
		return redirect()->route('categoriatranslate.index',$traduccion->categoria_id);
	}

	public  function destroyTranslate($id){
		try{
			$this->traduccion->destroy($id);
			return response()->json(['msg'=> 'El registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}
	}
}