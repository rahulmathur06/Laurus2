<?php namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Database\QueryException;
use Modules\Reservaciones\Entities\GrupoSeguros;
use Modules\Reservaciones\Http\Requests\GrupoSeguroRequest;
use Pingpong\Modules\Routing\Controller;

class GrupoSegurosController extends Controller {
	
	protected $grupo;

	public function __construct(GrupoSeguros $grupo){
		$this->grupo = $grupo;

	}

	public function index(){
		$grupos = $this->grupo->all();
		return view('reservaciones::Seguros.Grupos.index',compact('grupos'));
	}
	public function create(){
		return view('reservaciones::Seguros.Grupos.create');
	}

	public function store(GrupoSeguroRequest $request){
		$this->grupo->fill($request->all());
		$this->grupo->save();

		flash()->success('Creación exitosa.');
		return redirect()->to('grupo');
	}

	public function edit($id){
		$grupo = $this->grupo->find($id);
		return view('reservaciones::Seguros.Grupos.edit',compact('grupo'));
	}

	public function update(GrupoSeguroRequest $request,$id){
		$grupo = $this->grupo->find($id);
		$grupo->fill($request->all());
		$grupo->save();

		flash()->success('Actualización exitosa.');
		return redirect()->to('grupo');


	}

	public  function destroy($id){
		try{
			$this->grupo->destroy($id);
			return response()->json(['msg'=> 'el registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}
	}
	
}