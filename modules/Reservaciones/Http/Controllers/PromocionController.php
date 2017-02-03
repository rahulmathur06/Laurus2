<?php namespace Modules\Reservaciones\Http\Controllers;

use Modules\Reservaciones\Entities\CoberturaTraducciones;
use Modules\Reservaciones\Entities\Promocion;
use Modules\Reservaciones\Entities\PromocionTraducciones;
use Modules\Reservaciones\Entities\SeguroTarifas;
use Modules\Reservaciones\Http\Requests\PromocionRequest;
use Modules\Reservaciones\Http\Requests\TraduccionPromoRequest;
use Pingpong\Modules\Routing\Controller;

class PromocionController extends Controller {

	protected $promocion;
	protected $traduccion;
	public function __construct(Promocion $promocion, PromocionTraducciones $traducciones){
		$this->promocion = $promocion;
		$this->traduccion = $traducciones;
	}
	
	public function index(){
		$promociones = $this->promocion->all();
		return view('reservaciones::Promociones.Promocion.index',compact('promociones'));
	}

	public function create(){
		$coberturas = CoberturaTraducciones::where('idioma','es-MX')->lists('nombre','cobertura_id');
		$plancodes = SeguroTarifas::all()->lists('nombre','id');
		$value = $this->promocion->getValue();
		$moneda = $this->promocion->getMoneda();
		$tipo = $this->promocion->getTipoPromocion();
		if(count($coberturas) < 1){
			flash()->warning('Necesita crear una cobertura.');
			return redirect()->to('cobertura');
		}
		if(count($plancodes) < 1){
			flash()->warning('Necesita crear una tarifa.');
			return redirect()->to('seguros-tarifa');
		}
		return view('reservaciones::Promociones.Promocion.create',compact('coberturas','plancodes','value','moneda','tipo'));
	}

	public function store(PromocionRequest $request){
		$promo = $this->promocion->fill($request->only('plancode_id','cobertura_id','pages_id','destino_mes','fechaini','fechafin','descripcion','clave','acumular_prepago','acumular_prepago_valor','tarifa_desglozada','mostrar_descuento','moneda','tipo_promocion','terminos_condiciones','visible','activo'));
		$promo->save();

		$traduccion = $request->only('promocion_id','idioma','nombre','intro','contenido','restricciones','url','url_banner_home','url_banner','url_banner_locacion','url_blast','titulo_destino');
		$traduccion['promocion_id'] = $promo->id;
		$traduccion['idioma'] = 'es-Mx';

		$this->traduccion->fill($traduccion);
		$this->traduccion->save();

		flash()->success('Creación exitosa.');
		return redirect()->to('promociones');

	}

	public function edit($id){
		$promocion = $this->promocion->find($id);
		$coberturas = CoberturaTraducciones::where('idioma','es-MX')->lists('nombre','cobertura_id');
		$plancodes = SeguroTarifas::all()->lists('nombre','id');
		$value = $this->promocion->getValue();
		$moneda = $this->promocion->getMoneda();
		$tipo = $this->promocion->getTipoPromocion();
		return view('reservaciones::Promociones.promocion.edit',compact('promocion','coberturas','plancodes','value','moneda','tipo'));
	}

	public function update(PromocionRequest $request,$id){
		$promo = $this->promocion->find($id);
		$promo->fill($request->all());
		$promo->save();

		flash()->success('Actualización exitosa.');
		return redirect()->to('promociones');
	}


	public function indexTranslate($id){
		$traducciones = $this->promocion->find($id)->translations()->get();
		$promoid = $id;
		 return view('reservaciones::Promociones.promocion.translates',compact('traducciones','promoid'));
	}
	public function createTranslate($id){
		$promoid = $id;
		$idioma = $this->promocion->getIdioma();
		return view('reservaciones::Promociones.promocion.createTranslate',compact('promoid','idioma'));
	}

	public function storeTranslate(TraduccionPromoRequest $request){
		$exist = $this->traduccion->where('idioma',$request->get('idioma'))
								  ->where('promocion_id',$request->get('promocion_id'))->first();
		if($exist){
			flash()->error('Lo sentimos, esa traduccion ya existe.');
			return redirect()->route('promotranslate.index',$request->get('promocion_id'));
		}
		$data = $request->all();
		$this->traduccion->fill($data);
		$this->traduccion->save();

		flash()->success('Creación exitosa.');
		return redirect()->route('promotranslate.index',$this->traduccion->promocion_id);

	}

	public function editTranslate($id){
		$traduccion = $this->traduccion->find($id);
		return view('reservaciones::Promociones.promocion.editTranslate',compact('traduccion'));
	}

	public function updateTranslate(TraduccionPromoRequest $request,$id){


		$traduccion = $this->traduccion->find($id);
		$traduccion->fill($request->all());
		$traduccion->save();


		flash()->success('Actualización exitosa.');
		return redirect()->route('promotranslate.index',$traduccion->promocion_id);

	}
	
}