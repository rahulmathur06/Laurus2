<?php namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Database\QueryException;
use Modules\Reservaciones\Entities\AutoCategoria;
use Modules\Reservaciones\Entities\AutoCategoriaTraduccion;
use Modules\Reservaciones\Entities\AutoClases;
use Modules\Reservaciones\Entities\ClaseTraducciones;
use Modules\Reservaciones\Http\Requests\ClasesRequest;
use Modules\Reservaciones\Http\Requests\TraduccionClase;
use Pingpong\Modules\Routing\Controller;
use Response;

class AutosClasesController extends Controller {

	protected $clases;
	protected $traduccion;
	public function __construct(AutoClases $clases, ClaseTraducciones $traduccion){
		$this->clases = $clases;
		$this->traduccion = $traduccion;
	}
	
	public function index(){
		$clases = $this->clases->all();
		return view('reservaciones::Autos.Clases.index',compact('clases'));
	}

	public function create(){
		$grupos = $this->clases->getGroups();
		$categorias = AutoCategoriaTraduccion::where('idioma','es-MX')->lists('nombre','categoria_id');
		if(count($categorias) < 1){
			flash()->warning('Necesita crear una categoria.');
			return redirect()->to('categorias');
		}
		return view('reservaciones::Autos.Clases.create',compact('grupos','categorias'));
	}

	public function store(TraduccionClase $traduccionRequest, ClasesRequest $request){
		$this->clases->fill($request->only('categoria_id','sipp','clase','prioridad','grupo'));
		$this->clases->save();
		// translate
		$traduccion = $this->traduccion->fill($traduccionRequest->only('nombre','idioma','descripcion'));
	    $this->clases->translate()->save($traduccion);
		flash()->success('Creación exitosa.');
		return redirect()->to('clases');
	}

	public function edit($id){
		$grupos = $this->clases->getGroups();
		$categorias = AutoCategoriaTraduccion::where('idioma','es-MX')->lists('nombre','categoria_id');
		$clase = $this->clases->find($id);
		return view('reservaciones::Autos.Clases.edit',compact('clase','grupos','categorias'));
	}

	public function update(ClasesRequest $request, $id){
		$clase = $this->clases->find($id);
		$clase->fill($request->only('categoria_id','sipp','clase','prioridad','grupo'));
		$clase->save();

		flash()->success('Actualización exitosa.');
		return redirect()->to('clases');
	}

	public function destroy($id){
		try{
			$this->clases->destroy($id);
			return response()->json(['msg'=> 'El registro se elimino exitosamente.' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'Esta clase esta siendo usada'],202);
		}
	}


}