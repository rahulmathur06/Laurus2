<?php namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Database\QueryException;
use Modules\Reservaciones\Entities\Ciudad;
use Modules\Reservaciones\Entities\Destino;
use Modules\Reservaciones\Entities\Estado;
use Modules\Reservaciones\Http\Requests\CiudadDestinosRequest;
use Modules\Reservaciones\Http\Requests\CiudadRequest;
use PhpSpec\Exception\Exception;
use Pingpong\Modules\Routing\Controller;

class CiudadController extends Controller {


	protected $ciudad;
	public function __construct(Ciudad $ciudad){
		$this->ciudad = $ciudad;
	}
	
	public function index(){
		$ciudades = $this->ciudad->all();


		return view('reservaciones::Ciudades.index',compact('ciudades'));
	}

	public function create(){
		$estados = Estado::all()->lists('nombre','id');
		return view('reservaciones::Ciudades.create',compact('estados'));
	}
	public function store(CiudadRequest $request){
		$this->ciudad->fill($request->all());
		$this->ciudad->save();
		flash()->success('Nueva ciudad agregada');
		return redirect()->to('ciudad');
	}

	public function show($id){
		$ciudad = $this->ciudad->find($id);
		return view('reservaciones::Ciudades.show',compact('ciudad'));
	}

	public function edit($id){
		$ciudad = $this->ciudad->find($id);
		$estados = Estado::all()->lists('nombre','id');
		return view('reservaciones::Ciudades.edit',compact('ciudad','estados'));
	}

	public function update(CiudadRequest $request,$id){
		$ciudad = $this->ciudad->find($id);
		$ciudad->fill($request->all());
		$ciudad->save();
		flash()->success('La ciudad ha sido actualizado');
		return redirect()->to('ciudad');

	}
	public  function destroy($id){
		try{
			$this->ciudad->destroy($id);
			return response()->json(['msg'=> 'el registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}
	}

	/**
	 * destino
	 */

	public function createDestino($id){
		$ciudad_id = $id;
		$destinos = Destino::lists('nombre','id');

		if(count($destinos) < 1){
			flash()->success('Necesita crear primero un destino.');
			return redirect()->to('destino');
		}

		$ciudad = $this->ciudad->find($id);
		$ciudad['destino_id']= $ciudad->destinos()->get()->lists('id');

		return view('reservaciones::Ciudades.destinos',compact('destinos','ciudad_id','ciudad'));
	}
	public function storeDestino(CiudadDestinosRequest $request){
		$ciudad = $this->ciudad->find($request->get('ciudad_id'));
		$ciudad->addDestino($request->get('destino_id'));
		flash()->success('Creación exitosa');
		return redirect()->to('ciudad');
	}

	public function updateDestino(CiudadDestinosRequest $request,$id){
		$ciudad = $this->ciudad->find($id);
		$ciudad->addDestino($request->get('destino_id'));
		flash()->success('Actualizacion exitosa');
		return redirect()->to('ciudad');
	}

}