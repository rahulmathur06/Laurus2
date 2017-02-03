<?php

namespace Modules\Reservaciones\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Modules\Reservaciones\Http\Requests\TarifasRequest;
use Modules\Reservaciones\Entities\TarifaListado;
use Modules\Reservaciones\Entities\TarifaRack;
use Modules\Reservaciones\Entities\TarifaCorp;
use Modules\Reservaciones\Entities\TrackPrecio;
use Modules\Reservaciones\Entities\TcorpPrecio;
use Modules\Reservaciones\Entities\TarifaPromo;
use Modules\Reservaciones\Entities\TarifaTemporada;
use Modules\Reservaciones\Entities\AutoClases;
use Illuminate\Support\Facades\Request;
use Modules\CuentasCorporativas\Entities\PersonasTipo;
use Illuminate\Support\Facades\DB;

class TarifasAuthController extends Controller {

    protected $auth;
    protected $TarifaListado;

    public function __construct(TarifaListado $TarifaListado) {
        $this->auth = Sentinel::getUser();
        $this->TarifaListado = $TarifaListado;
    }

    public function index() {
        $tarifas = $this->TarifaListado->where('status', 0)->get();
        $tarifa_types = [1 => 'Rack', 2 => 'Corporativa', 3 => 'Temporada', 4 => 'Promocional'];
        return view('reservaciones::tarifa_auth.index', compact('tarifas', 'tarifa_types'));
    }

    public function show($id) {
        $tarifa_tipos = [TarifaListado::TIPO_TARIFA_RACK => 'Rack', TarifaListado::TIPO_TARIFA_CORP => 'Corporativa', TarifaListado::TIPO_TARIFA_TEMP => 'Temporadas', TarifaListado::TIPO_TARIFA_PROMO => 'Promocional'];
        $clasesData = AutoClases::select('sipp', 'clase')->get();
        $clases = $clasesData->toArray();
        $clases_count = $clasesData->count();
        $status = [0 => 'PENDIENTE DE AUTORIZACION', 1 => 'APROBADA', 2 => 'RECHAZADA'];
        $Tarifa = $this->TarifaListado->findOrFail($id);
        switch ($Tarifa->tipo) {
            case TarifaListado::TIPO_TARIFA_RACK:
                $precio = TrackPrecio::where('tarifa_id', $id)->lists('tarifa', 'clave_sipp');
                break;
            case TarifaListado::TIPO_TARIFA_CORP:
                $precio = TcorpPrecio::where('tarifa_id', $id)->lists('tarifa', 'clave_sipp');
                break;
            default:
                break;
        }

        return view('reservaciones::tarifa_auth.show', compact('Tarifa', 'tarifa_tipos', 'clases', 'clases_count', 'status', 'precio'));
    }

    public function update($id) {
        $tarifa = $this->TarifaListado->findOrFail($id);
        $tarifa->status = (int)Request::input('status') === 1 ? 1 : 2;
        $tarifa->autorizacion = $this->auth->id;
        $tarifa->save();
        alert()->success('Entrada marcada con éxito.', 'Éxito')->persistent('Cerrar');
        return redirect('tarifas/auth');
    }

}
