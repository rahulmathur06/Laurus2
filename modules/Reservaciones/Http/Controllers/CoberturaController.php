<?php namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Modules\Reservaciones\Entities\Cobertura;
use Modules\Reservaciones\Entities\CoberturaTraducciones;
use Modules\Reservaciones\Http\Requests\CoberturaRequest;
use Modules\Reservaciones\Http\Requests\TraduccionCoberturaRequest;
use Pingpong\Modules\Routing\Controller;

class CoberturaController extends Controller {

	protected $cobertura;
	protected $traduccion;

	public function __construct(Cobertura $cobertura,CoberturaTraducciones $traduccion){
		$this->cobertura = $cobertura;
		$this->traduccion = $traduccion;
	}

	public function index(){
		$coberturas = $this->cobertura->all();
		return view('reservaciones::Seguros.Coberturas.index',compact('coberturas'));
	}

	public function create(){
		$catalogos = $this->cobertura->getCatalogos();
		$tipoCobertura = $this->cobertura->getTipoCoberturas();
		if(count($catalogos) < 1){
			flash()->warning('Necesita crear un catalogo.');
			return redirect()->to('catalogo');
		}
		return view('reservaciones::Seguros.Coberturas.create',compact('catalogos','tipoCobertura'));
	}

	public function store(CoberturaRequest $request, TraduccionCoberturaRequest $traduccion){
		$this->cobertura->fill($request->only('pcode','pcodetarifa','web'));
		$this->cobertura->save();
		// add catalogos id table pivote
		$this->cobertura->addCatalogos($request->get('catalogo_id'));
		// translate
		$traduccion = $this->traduccion->fill($traduccion->only('nombre','idioma','descripcion'));
		$this->cobertura->translate()->save($traduccion);
		flash()->success('Creación exitosa.');
		return redirect()->to('cobertura');
	}

	public function edit($id){
		$cobertura = $this->cobertura->find($id);
		$cobertura['catalogo_id']= $cobertura->catalogos()->get()->lists('id');
		$tipoCobertura = $this->cobertura->getTipoCoberturas();
		$catalogos = $this->cobertura->getCatalogos();
		return view('reservaciones::Seguros.Coberturas.edit',compact('cobertura','catalogos','tipoCobertura'));
	}

	public function update(CoberturaRequest $request, $id){
		$cobertura = $this->cobertura->find($id);
		$cobertura->fill($request->only('pcode','pcodetarifa','web'));
		$cobertura->save();
		// save catalogos
		$cobertura->addCatalogos($request->get('catalogo_id'));
		flash()->success('Actualización exitosa.');
		return redirect()->to('cobertura');
	}

	public  function destroy($id){
		try{
			$this->cobertura->destroy($id);
			return response()->json(['msg'=> 'el registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}
	}

	/**
	 * Translates cobertura
	 */
	public function indexTranslate($id){
		$traducciones = $this->cobertura->find($id)->translate()->get();
		$cobertura_id = $id;
		return view('reservaciones::Seguros.Coberturas.translate.index',compact('traducciones','cobertura_id'));
	}
	public function createTranslate($id){
		$cobertura_id = $id;
		$idioma = $this->traduccion->getIdioma();
		return view('reservaciones::Seguros.Coberturas.translate.create',compact('cobertura_id','idioma'));
	}

	public function storeTranslate(TraduccionCoberturaRequest $request){
		$exist = $this->traduccion->where('idioma',$request->get('idioma'))
			->where('cobertura_id',$request->get('cobertura_id'))->first();
		if($exist){
			flash()->error('Lo sentimos, esa traduccion ya existe.');
			return redirect()->route('coberturatranslate.index',$request->get('cobertura_id'));
		}

		$this->traduccion->fill($request->all());
		$this->traduccion->save();

		flash()->success('Creación exitosa.');
		return redirect()->route('coberturatranslate.index',$this->traduccion->cobertura_id);

	}

	public function editTranslate($id){
		$traduccion = $this->traduccion->find($id);
		return view('reservaciones::Seguros.Coberturas.translate.edit',compact('cobertura_id','traduccion'));
	}

	public function updateTranslate(TraduccionCoberturaRequest $request,$id){
		$traduccion = $this->traduccion->find($id);
		$traduccion->fill($request->all());
		$traduccion->save();
		flash()->success('Actualización exitosa.');
		return redirect()->route('coberturatranslate.index',$traduccion->cobertura_id);

	}


	public function destroyTranslate($id){
		try{
			$this->traduccion->destroy($id);
			return response()->json(['msg'=> 'el registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}

	}

}
