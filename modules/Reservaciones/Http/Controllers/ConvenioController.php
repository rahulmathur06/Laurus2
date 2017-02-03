<?php namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Database\QueryException;
use Modules\Reservaciones\Entities\Convenio;
use Modules\Reservaciones\Http\Requests\ConvenioRequest;
use Pingpong\Modules\Routing\Controller;

class ConvenioController extends Controller {
	/**
	 * @var Convenio
	 */
	protected $convenio;

	/**
	 * @param Convenio $convenio
	 */
	public function __construct(Convenio $convenio){
		$this->convenio = $convenio;

	}
	public function index(){
		$convenios = $this->convenio->all();
		return view('reservaciones::Convenios.index',compact('convenios'));
	}
	public function create(){
		$tipos = $this->convenio->getTypes();
		$value = $this->convenio->getValue();
		return view('reservaciones::Convenios.create',compact('tipos','value'));
	}
	public function store(ConvenioRequest $request){
		$this->convenio->create($request->all());
		flash()->success('Creación exitosa.');
		return redirect()->to('convenio');
	}
	public function edit($id){
		$convenio = $this->convenio->find($id);
		$tipos = $this->convenio->getTypes();
		$value = $this->convenio->getValue();
		return view('reservaciones::Convenios.edit',compact('convenio','tipos','value'));
	}
	public function update($id, ConvenioRequest $request){
		$convenio = $this->convenio->find($id);
		$convenio->fill($request->all());
		$convenio->save();
		flash()->success('Actualización exitosa.');
		return redirect()->to('convenio');
	}

	public function show($id){
		$convenio = $this->convenio->find($id);
		return view('reservaciones::Convenios.show',compact('convenio'));
	}

	public function destroy($id){
		try{
			$this->convenio->destroy($id);
			return response()->json(['msg'=> 'Exito el registro ha sido eliminado.' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro, esta siendo usado en otro registro.'],202);
		}
	}

}