<?php namespace Modules\Reservaciones\Http\Controllers;

use Illuminate\Database\QueryException;
use Modules\Reservaciones\Entities\Ciudad;
use Modules\Reservaciones\Entities\ClaseTraducciones;
use Modules\Reservaciones\Entities\Locacion;
use Modules\Reservaciones\Entities\LocacionDireccion;
use Modules\Reservaciones\Entities\LocacionTraducciones;
use Modules\Reservaciones\Http\Requests\LocacionClasesRequest;
use Modules\Reservaciones\Http\Requests\LocacionRequest;
use Modules\Reservaciones\Http\Requests\TraduccionLocacionRequest;
use Pingpong\Modules\Routing\Controller;

class LocacionController extends Controller {

	protected $locacion;
	protected $traduccion;
	protected $direccion;
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct(Locacion $locacion, LocacionTraducciones $traduccion,LocacionDireccion $direccion){
		$this->locacion = $locacion;
		$this->traduccion = $traduccion;
		$this->direccion = $direccion;
	}
	/**
	 * Show the application index to the location.
	 *
	 * @return Response
	 */
	public function index(){
		$locaciones = $this->locacion->all();
		return view('reservaciones::Locaciones.index',compact('locaciones'));
	}

	/**
	 * @return \Illuminate\View\View
	 */
	public function create(){
		$ciudades = Ciudad::all()->lists('nombre','id');
		if(count($ciudades) < 1){
			flash()->warning('Necesita crear una ciudad.');
			return redirect()->to('ciudad');
		}

		$grupos = $this->locacion->getGroups();
		$iva = $this->locacion->getIva();
		$activo = $this->locacion->getActivo();
		$tipo = $this->locacion->getTipo();

		return view('reservaciones::Locaciones.create',compact('ciudades','grupos','iva','activo','tipo'));
	}

	/**
	 * @param LocacionRequest $request
	 * @return \Illuminate\Http\RedirectResponse
	 */

	public function store(LocacionRequest $request){

		$this->locacion->fill($request->only(['ciudad_id','clave','clave_jr','grupo','orden','airportfee','iva','zoom','centro_latitud','centro_longitud','direccion_google_maps','activo','tipo_locacion','latitud','longitud']));

		if($request->hasFile('imagen')){
			$image = $request->file('imagen');
			$this->locacion->imagen = $image->getClientOriginalName();
			$image->move(public_path().'/img/locaciones',$image->getClientOriginalName());
		}

		// save location
		$this->locacion->save();
		// create address
		$direccion = $this->direccion->fill($request->only(['direccion','colonia','cp','tel1','tel2','horario','horario2']));
		$this->locacion->direccion()->save($direccion);
		// translate
		$traduccion = $this->traduccion->fill($request->only('idioma','nombre'));
		$this->locacion->translate()->save($traduccion);
		flash()->success('Creación exitosa');
		return redirect()->to('locacion');
	}

	/**
	 * @param $id
	 * @return \Illuminate\View\View
	 */
	public function show($id){
		$locacion = $this->locacion->find($id);
		return view('reservaciones::Locaciones.show',compact('locacion'));
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id){
		$locacion = $this->locacion->find($id);
		$address = $locacion->direccion;

		
		$ciudades = Ciudad::all()->lists('nombre','id');
		$grupos = $this->locacion->getGroups();
		$iva = $this->locacion->getIva();
		$activo = $this->locacion->getActivo();
		$tipo = $this->locacion->getTipo();
		return view('reservaciones::Locaciones.edit',compact('locacion','ciudades','grupos','iva','activo','tipo','address'));
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	public function update(LocacionRequest $request, $id){

		$locacion = $this->locacion->find($id);
		$locacion->fill($request->only(['ciudad_id','clave','clave_jr','grupo','orden','airportfee','iva','zoom','centro_latitud','centro_longitud','direccion_google_maps','activo','tipo_locacion','latitud','longitud']));
		if($request->hasFile('imagen')){
			$image = $request->file('imagen');
			$filename = public_path() . '/img/locaciones/' . $locacion->imagen;
			$locacion->imagen = $image->getClientOriginalName();
			$image->move(public_path().'/img/locaciones',$image->getClientOriginalName());
			if (\File::exists($filename)){
				\File::delete($filename);
			}
		}
		// save locacion
		$locacion->save();
		//save address
		$direccion = $this->direccion->find($request->get('direccion_id'));
		$direccion->fill($request->only(['direccion','colonia','cp','tel1','tel2','horario','horario2']));
		$direccion->save();
		flash()->success('Actualización exiosa.');
		return redirect()->to('locacion');
	}
	public  function destroy($id){
		try{
			$locacion = $this->locacion->find($id);
			$filename = public_path() . '/img/locaciones/' . $locacion->imagen;
			$locacion->destroy($id);
			if (\File::exists($filename)){
				\File::delete($filename);
			}
			return response()->json(['msg'=> 'el registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}
	}


	/**
	 * Translates locacion
	 */
	public function indexTranslate($id){
		$traducciones = $this->locacion->find($id)->translate()->get();
		$locacion_id = $id;
		return view('reservaciones::Locaciones.translate.index',compact('traducciones','locacion_id'));
	}
	public function createTranslate($id){
		$locacion_id = $id;
		$idioma = $this->traduccion->getIdioma();
		return view('reservaciones::Locaciones.translate.create',compact('locacion_id','idioma'));
	}

	public function storeTranslate(TraduccionLocacionRequest $request){
		$exist = $this->traduccion->where('idioma',$request->get('idioma'))
			->where('locacion_id',$request->get('locacion_id'))->first();
		if($exist){
			flash()->error('Lo sentimos, esa traduccion ya existe.');
			return redirect()->route('locaciontranslate.index',$request->get('locacion_id'));
		}
		$this->traduccion->fill($request->all());
		$this->traduccion->save();
		flash()->success('Creación exitosa.');
		return redirect()->route('locaciontranslate.index',$this->traduccion->locacion_id);
	}

	public function editTranslate($id){
		$traduccion = $this->traduccion->find($id);
		return view('reservaciones::Locaciones.translate.edit',compact('locacion_id','traduccion'));
	}

	public function updateTranslate(TraduccionLocacionRequest $request,$id){
		$traduccion = $this->traduccion->find($id);
		$traduccion->fill($request->all());
		$traduccion->save();
		flash()->success('Actualización exitosa.');
		return redirect()->route('locaciontranslate.index',$traduccion->locacion_id);
	}
	public  function destroyTranslate($id){
		try{
			$this->traduccion->destroy($id);
			return response()->json(['msg'=> 'el registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}
	}


	/**
	 * Autos clases
	 */

	public function createClases($id){
		$locacion_id = $id;
		$clases = ClaseTraducciones::where('idioma','es-MX')->lists('nombre','clase_id');
		if(count($clases) < 1){
			flash()->success('Necesita crear minimo una clase');
			return redirect()->to('clases');
		}
		$locacion = $this->locacion->find($id);
		$locacion['clase_id']= $locacion->clases()->get()->lists('id')->all();
		return view('reservaciones::Locaciones.clases',compact('clases','locacion_id','locacion'));
	}
	public function storeClases(LocacionClasesRequest $request){
		$locacion = $this->locacion->find($request->get('locacion_id'));
		$locacion->addClases($request->get('clase_id'));
		flash()->success('Creación exitosa');
		return redirect()->to('locacion');
	}

	public function updateClases(LocacionClasesRequest $request,$id){
		$locacion = $this->locacion->find($id);
		$locacion->addClases($request->get('clase_id'));
		flash()->success('Actualizacion exitosa');
		return redirect()->to('locacion');
	}








}