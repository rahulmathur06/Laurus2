<?php namespace Modules\Reservaciones\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Reservaciones\Entities\PromoListado;
use Modules\Reservaciones\Http\Requests\PromoRequest;

class PromoListController extends Controller {

    protected $PromoListado;

    public function __construct(PromoListado $PromoListado) {
        $this->PromoListado = $PromoListado;
    }

    public function index() {
        $PromoListado = $this->PromoListado->all();
        $promo_types = [1 => 'Mas por Menos', 2 => 'Descuento Porcentual', 3 => 'Descuento en Días', 4 => 'Descuento en Cantidad'];
        return view('reservaciones::promo_list.index', compact('PromoListado', 'promo_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $promo_types = [1 => 'Mas por Menos', 2 => 'Descuento Porcentual', 3 => 'Descuento en Días', 4 => 'Descuento en Cantidad'];
        return view('reservaciones::promo_list.create', compact('promo_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PromoRequest $request) {
        //fill valuses in model
        $this->PromoListado->fill($request->only('promocode', 'descripcion', 'tipo_promo', 'fechaini', 'fechafin'));
        $this->PromoListado->activo = isset($request->activo) ? 1 : 0;
        $this->PromoListado->setFactorValue($request->only('factor_mxm', 'factor_dpor', 'factor_ddia', 'factor_dcant'));
        //save model
        $this->PromoListado->save();
        //success message 
        flash()->success('Creación exitosa.');
        //redirect to index
        return redirect('promos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $PromoListado = $this->PromoListado->findOrFail($id);
        $promo_types = [1 => 'Mas por Menos', 2 => 'Descuento Porcentual', 3 => 'Descuento en Días', 4 => 'Descuento en Cantidad'];
        return view('reservaciones::promo_list.edit', compact('PromoListado', 'promo_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PromoRequest $request, $id) {

        $PromoListado = $this->PromoListado->findOrFail($id);
        //fill valuses in model
        $PromoListado->fill($request->only('promocode', 'descripcion', 'tipo_promo', 'fechaini', 'fechafin'));
        $PromoListado->activo = isset($request->activo) ? 1 : 0;
        $PromoListado->setFactorValue($request->only('factor_mxm', 'factor_dpor', 'factor_ddia', 'factor_dcant'));
        //save model
        $PromoListado->save();
        // message
        flash()->success('Actualización exitosa.');

        return redirect('promos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $PromoListado = $this->PromoListado->find($id);
            $PromoListado->destroy($id);
            return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
        } catch (QueryException $e) {
            return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
        }
    }
	
}