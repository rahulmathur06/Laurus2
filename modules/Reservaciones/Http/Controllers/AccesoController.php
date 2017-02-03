<?php namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Database\QueryException;
use Modules\Reservaciones\Entities\Acceso;
use Modules\Reservaciones\Entities\Convenio;
use Modules\Reservaciones\Http\Requests\AccesoRequest;
use Pingpong\Modules\Routing\Controller;

class AccesoController extends Controller {

	protected $acceso;
	protected $convenio;

	/**
	 * @param Acceso $acceso
	 * @param Convenio $convenio
	 */
	public function __construct(Acceso $acceso, Convenio $convenio){
		$this->acceso = $acceso;
		$this->convenio = $convenio;
	}
	public function index(){
		$accesos = $this->acceso->all();
		return view('reservaciones::Accesos.index',compact('accesos'));
	}
	public function create(){
		$convenios = $this->convenio->all()->lists('nombre','id');

		if(count($convenios) < 1){
			flash()->warning('Necesita crear un convenio.');
			return redirect()->to('convenio');
		}
		return view('reservaciones::Accesos.create',compact('convenios'));
	}
	public function store(AccesoRequest $request){
		$this->acceso->fill($request->all());
		$this->acceso->save();
		flash()->success('Nuevo acceso creado');
		return redirect()->to('acceso');
	}

	public function edit($id){
		$acceso = $this->acceso->find($id);
		$convenios = $this->convenio->all()->lists('nombre','id');
		return view('reservaciones::Accesos.edit',compact('acceso','convenios'));

	}
	public function update($id, AccesoRequest $request){
		$acceso = $this->acceso->find($id);
		$acceso->fill($request->except('password'));
		if(!empty($request->get('password'))){
			$acceso['password'] = $request->get('password');
		}

		$acceso->save();
		flash()->success('El acceso ha sido actualizado');
		return redirect()->to('acceso');
	}

	public function show($id){
		$acceso = $this->acceso->find($id);

		return view('reservaciones::Accesos.show',compact('acceso'));
	}

	public  function destroy($id){
		try{
			$this->acceso->destroy($id);
			return response()->json(['msg'=> 'el registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}
	}
}