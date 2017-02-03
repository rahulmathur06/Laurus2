<?php

namespace Modules\Reservaciones\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
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
use Modules\Notifications\Entities\Notification;
use Modules\Roles\Entities\Rol;

class TarifasController extends Controller {

    protected $TarifaListado;

    public function __construct(TarifaListado $TarifaListado) {
        $this->TarifaListado = $TarifaListado;
    }

    public function index() {
        $tarifas = $this->TarifaListado->all();
        $tarifa_types = [1 => 'Rack', 2 => 'Corporativa', 3 => 'Temporada', 4 => 'Promocional'];
        return view('reservaciones::tarifas.index', compact('tarifas', 'tarifa_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $tarifa_tipos = [TarifaListado::TIPO_TARIFA_RACK => 'Rack', TarifaListado::TIPO_TARIFA_CORP => 'Corporativa', TarifaListado::TIPO_TARIFA_TEMP => 'Temporadas', TarifaListado::TIPO_TARIFA_PROMO => 'Promocional'];
        $clasesData = AutoClases::select('sipp', 'clase')->get();
        $clases = $clasesData->toArray();
        $clases_count = $clasesData->count();
        return view('reservaciones::tarifas.create', compact('tarifa_tipos', 'clases', 'clases_count'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TarifasRequest $request) {
        //fill valuses in model
        $this->TarifaListado->fill($request->only('nombre', 'descripcion', 'tipo', 'f_ini', 'f_fin', 'moneda'));
        //save model
        $this->TarifaListado->save();

        switch ($this->TarifaListado->tipo) {
            case TarifaListado::TIPO_TARIFA_RACK:
                $this->save_tarifa_rack($request->tarifabase, $request->precio, $this->TarifaListado->id);
                break;
            case TarifaListado::TIPO_TARIFA_CORP:
                $this->save_tarifa_corp($request->personas, $request->precio, $this->TarifaListado->id);
                break;
            case TarifaListado::TIPO_TARIFA_PROMO:
                $this->save_tarifa_promo($request, $this->TarifaListado->id);
                break;
            case TarifaListado::TIPO_TARIFA_TEMP:
                $this->save_tarifa_temp($request, $this->TarifaListado->id);
                break;
            default:
            //donothing();
        }
        // Notification
        $this->createApprovalNotification($this->TarifaListado->id);
        //success message 
        flash()->success('Creación exitosa.');
        //redirect to index
        return redirect('tarifas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return view('reservaciones::tarifas.show', compact('Tarifa', 'tarifa_tipos', 'clases', 'clases_count', 'status', 'precio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
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
            case TarifaListado::TIPO_TARIFA_PROMO:
                $precio = TcorpPrecio::where('tarifa_id', $id)->lists('tarifa', 'clave_sipp');
                break;
            case TarifaListado::TIPO_TARIFA_TEMP:
                $precio = TcorpPrecio::where('tarifa_id', $id)->lists('tarifa', 'clave_sipp');
                break;
            default:
                break;
        }
        return view('reservaciones::tarifas.edit', compact('Tarifa', 'tarifa_tipos', 'clases', 'clases_count', 'status', 'precio'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TarifasRequest $request, $id) {

        $tarifa = $this->TarifaListado->findOrFail($id);
        //In case of non editale
        if ((int) $tarifa->status === 1) {
            // message
            flash()->error('Error en la actualización');

            return redirect('tarifas');
        }
        //var_dump($tarifa->prices());die;
        $tarifa->details()->delete();
        if ($tarifa_prices = $tarifa->prices())
            $tarifa_prices->delete();
        //fill valuses in model
        $tarifa->fill($request->only('nombre', 'descripcion', 'tipo', 'f_ini', 'f_fin', 'moneda'));
        //save model
        $tarifa->save();

        switch ($tarifa->tipo) {
            case TarifaListado::TIPO_TARIFA_RACK:
                $this->save_tarifa_rack($request->tarifabase, $request->precio, $id);
                break;
            case TarifaListado::TIPO_TARIFA_CORP:
                $this->save_tarifa_corp($request->personas, $request->precio, $id);
                break;
            case TarifaListado::TIPO_TARIFA_PROMO:
                $this->save_tarifa_promo($request, $id);
                break;
            case TarifaListado::TIPO_TARIFA_TEMP:
                $this->save_tarifa_temp($request, $id);
                break;
            default:
            //donothing();
        }

        // message
        flash()->success('Actualización exitosa.');

        return redirect('tarifas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        try {
            $Tarifa = $this->TarifaListado->find($id);
            $Tarifa->details()->delete();
            if ($tarifa_prices = $Tarifa->prices())
                $tarifa_prices->delete();
            $Tarifa->destroy($id);
            return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
        } catch (QueryException $e) {
            return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
        }
    }

    public function getDetail() {
        try {
            $tipo_tarifa = Request::input('type');
            $tarifa_id = Request::input('tarifa_id');
            switch ($tipo_tarifa) {
                case TarifaListado::TIPO_TARIFA_RACK:
                    $model = TarifaRack::where('tarifa_id', $tarifa_id)->first();
                    $details = $model ? (int) $model->tarifabase : null;
                    return view('reservaciones::tarifas.partials.details.rack', compact('details'));
                case TarifaListado::TIPO_TARIFA_CORP:
                    $details = (int) $tarifa_id ? TarifaCorp::where('tarifa_id', $tarifa_id)->lists('person_type')->toArray() : array();
                    $tipo_personas = PersonasTipo::lists('descripcion', 'id');
                    return view('reservaciones::tarifas.partials.details.corp', compact('tipo_personas', 'details'));
                case TarifaListado::TIPO_TARIFA_PROMO:
                    $tarifa_base = DB::table('mv3_tarifa_rack as tarifa_rack')->join('mv3_tarifas_listado as tarifa_main', 'tarifa_rack.tarifa_id', '=', 'tarifa_main.id')->select('tarifa_main.id', 'tarifa_main.nombre')->lists('nombre', 'id');
                    $promo = (int) $tarifa_id ? TarifaPromo::select('*')->where('tarifa_id', $tarifa_id)->first() : array();
                    return view('reservaciones::tarifas.partials.details.promo', compact('tarifa_base', 'promo'));
                case TarifaListado::TIPO_TARIFA_TEMP:
                    $temps = (int) $tarifa_id ? TarifaTemporada::select('*')->where('tarifa_id', $tarifa_id)->get() : array();
                    $tarifa_base = DB::table('mv3_tarifa_rack as tarifa_rack')->join('mv3_tarifas_listado as tarifa_main', 'tarifa_rack.tarifa_id', '=', 'tarifa_main.id')->select('tarifa_main.id', 'tarifa_main.nombre')->lists('nombre', 'id');
                    return view('reservaciones::tarifas.partials.details.temp', compact('tarifa_base', 'temps'));
                default:
                    echo 'Coming Soon.';
                    die;
            }
        } catch (QueryException $e) {
            return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
        }
    }

    protected function save_tarifa_rack($details, $price, $tarifa_id) {
        //save tarifa
        $TarifaRack = new TarifaRack();
        $TarifaRack->fill(['tarifa_id' => $tarifa_id, 'tarifabase' => isset($details) ? 1 : 0]);
        $TarifaRack->save();
        //save precio
        $record_prices = [];
        foreach ($price as $sipp => $precio) {
            $record_prices[] = ['clave_sipp' => $sipp, 'tarifa' => $precio, 'tarifa_id' => $tarifa_id];
        }
        TrackPrecio::insert($record_prices);
    }

    protected function save_tarifa_corp($details, $price, $tarifa_id) {
        $record_details = $record_prices = [];
        foreach ($details as $id => $person) {
            $record_details[] = ['tarifa_id' => $tarifa_id, 'person_type' => $id];
        }
        TarifaCorp::insert($record_details);
        foreach ($price as $sipp => $precio) {
            $record_prices[] = ['clave_sipp' => $sipp, 'tarifa' => $precio, 'tarifa_id' => $tarifa_id];
        }
        TcorpPrecio::insert($record_prices);
    }

    protected function save_tarifa_promo(TarifasRequest $request, $tarifa_id) {
        $TarifaPromo = new TarifaPromo;
        $TarifaPromo->fill(['tarifa_id' => $tarifa_id, 'factor_promo' => $request->input('factor_promo'), 'tipo_factor' => $request->input('tipo_factor'), 'fecha_inicio' => $request->input('fecha_inicio'), 'fecha_fin' => $request->input('fecha_fin'), 'precio_rack_id' => $request->input('precio_rack_id')]);
        $TarifaPromo->save();
    }

    protected function save_tarifa_temp(TarifasRequest $request, $tarifa_id) {
        $temps = $request->input('temp');
        $entries = [];
        foreach ($temps as $key => $val) {
            $nombre_temporada = $val['nombre_temporada'];
            $fecha_inicio = $val['fecha_inicio'];
            $fecha_fin = $val['fecha_fin'];
            $precio_rack_id = $val['precio_rack_id'];
            $entries[] = ['tarifa_id' => $tarifa_id, 'nombre_temporada' => $nombre_temporada, 'fecha_inicio' => $fecha_inicio, 'fecha_fin' => $fecha_fin, 'precio_rack_id' => $precio_rack_id];
        }
        TarifaTemporada::insert($entries);
    }

    private function createApprovalNotification($tarifa_id) {

        $notification = Notification::create([
                    'icon' => 'fa-envelope-o',
                    'name' => 'Aprobación de Nueva Tarifa',
                    'description' => 'Aprobar o Rechazar el registro de la nueva Tarifa.',
                    'url' => route('tarifa_auth.show', $tarifa_id)
        ]);

        $notification->addRole(Rol::where('slug', 'gerente_de_tarifas')->first()->getRoleId());
        return $notification->id;
    }

}
