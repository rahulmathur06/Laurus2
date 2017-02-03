<?php namespace Modules\Reservaciones\Http\Controllers;


use Illuminate\Database\QueryException;
use Modules\Reservaciones\Entities\ClaseTraducciones;
use Modules\Reservaciones\Entities\Flotilla;
use Modules\Reservaciones\Http\Requests\FlotillaEditRequest;
use Modules\Reservaciones\Http\Requests\FlotillaRequest;
use Pingpong\Modules\Routing\Controller;

class FlotillaController extends Controller {


	protected $flotilla;

	public function __construct(Flotilla $flotilla){
		$this->flotilla = $flotilla;

	}
	
	public function index()
	{
		$flotillas = $this->flotilla->all();

		return view('reservaciones::Autos.Flotilla.index',compact('flotillas'));
	}
	public function create(){
		$transmision = $this->flotilla->getTransmision();
		$aire = $this->flotilla->getAire();
		$clases = ClaseTraducciones::where('idioma','es-MX')->lists('nombre','clase_id');
		if(count($clases) < 1){
			flash()->warning('Necesita crear una clase.');
			return redirect()->to('clases');
		}

			$grupos = $this->flotilla->getGrupos();
		return view('reservaciones::Autos.Flotilla.create',compact('transmision','clases','grupos','aire'));
	}

	public function store(FlotillaRequest $request){
		$filleable = $request->only('clase_id','nombre','grupo','puertas','transmision','aire_acondicionado','pasajeros','equipaje_grande','equipaje_chico');
		$this->flotilla->fill($filleable);

		$this->flotilla->imagen = $this->saveImage($request->file('imagen'));
		$this->flotilla->imagen_chica = $this->saveImage($request->file('imagen_chica'));
		$this->flotilla->img_carousel = $this->saveImage($request->file('img_carousel'));
		$this->flotilla->save();

		flash()->success('Creación exitosa.');
		return redirect()->to('flotilla');
	}

	public function edit($id)
	{
		$transmision = $this->flotilla->getTransmision();
		$aire = $this->flotilla->getAire();
		$clases = ClaseTraducciones::where('idioma','es-MX')->lists('nombre','clase_id');
		$grupos = $this->flotilla->getGrupos();
		$flotilla = $this->flotilla->find($id);

		return view('reservaciones::Autos.Flotilla.edit',compact('flotilla','transmision','clases','grupos','aire'));

	}

	public function update(FlotillaEditRequest $request, $id){
		$filleable = $request->only('clase_id','nombre','grupo','puertas','transmision','aire_acondicionado','pasajeros','equipaje_grande','equipaje_chico');
		// search flotilla
		$flotilla = $this->flotilla->find($id);
		// fill data
		$flotilla->fill($filleable);

		if($request->hasFile('imagen')){
			$this->existImage($flotilla->imagen);
			$flotilla->imagen = $this->saveImage($request->file('imagen'));
		}
		if($request->hasFile('imagen_chica')){
			$this->existImage($flotilla->imagen_chica);
			$flotilla->imagen_chica = $this->saveImage($request->file('imagen_chica'));
		}
		if($request->hasFile('img_carousel')){
			$this->existImage($flotilla->img_carousel);
			$flotilla->img_carousel =  $this->saveImage($request->file('img_carousel'));
		}
		// save flotilla
		$flotilla->save();
		// message
		flash()->success('Actualización exitosa.');
		return redirect()->to('flotilla');

	}

	public  function destroy($id){
		try{
			$flotilla = $this->flotilla->find($id);
			$this->existImage($flotilla->imagen);
			$this->existImage($flotilla->imagen_chica);
			$this->existImage($flotilla->img_carousel);
			$flotilla->destroy($id);
			return response()->json(['msg'=> 'el registro se elimino exitosamente' ],200);
		}catch (QueryException $e){
			return response()->json(['msg'=> 'No se pudo eliminar el registro'],202);
		}
	}

	private function saveImage($image){
		$filename = public_path().'/img/flotilla/';
		$image->move($filename,$image->getClientOriginalName());
		return $filename.$image->getClientOriginalName();

	}


	private function existImage($old_img){
		if (\File::exists($old_img)){
			\File::delete($old_img);
		}
	}
	
}