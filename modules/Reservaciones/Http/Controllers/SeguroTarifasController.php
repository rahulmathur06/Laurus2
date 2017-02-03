<?php namespace Modules\Reservaciones\Http\Controllers;

use Modules\Reservaciones\Entities\SeguroTarifas;
use Modules\Reservaciones\Http\Requests\SeguroTarifasRequest;
use Pingpong\Modules\Routing\Controller;

class SeguroTarifasController extends Controller {

	protected $seguroTarifas;

	public function __construct(SeguroTarifas $seguroTarifas){
		$this->seguroTarifas = $seguroTarifas;
	}

	
	public function index(){
		$tarifas = $this->seguroTarifas->all();
		return view('reservaciones::Seguros.Tarifas.index',compact('tarifas'));
	}
	public function create(){
		return view(('reservaciones::Seguros.Tarifas.create'));
	}
	public function store(SeguroTarifasRequest $request){
		$this->seguroTarifas->fill($request->all());
		$this->seguroTarifas->save();

		flash()->success('Creación exitosa.');
		return redirect()->to('seguros-tarifa');

	}

	public function edit($id){
		$tarifa = $this->seguroTarifas->find($id);
		 return view('reservaciones::Seguros.Tarifas.edit',compact('tarifa'));
	}
	public function update(SeguroTarifasRequest $request,$id){
		$tarifa = $this->seguroTarifas->find($id);
		$tarifa->fill($request->all());
		$tarifa->save();
		flash()->success('Actualización exitosa.');
		return redirect()->to('seguros-tarifa');
	}
	public  function destroy($id){
		try{
			$this->seguroTarifas->destroy($id);
			return response()->json(['msg'=> 'el registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}
	}
	
}