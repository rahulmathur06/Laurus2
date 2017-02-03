<?php namespace Modules\Flota\Http\Controllers;

use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Modules\Flota\Http\Requests\FlotaRequest;
use Modules\Flota\Entities\Unidad;
use Modules\Flota\Entities\Estatus_activo;
use Modules\Flota\Entities\Plaza;
use Modules\Flota\Entities\Status;
use Modules\Flota\Entities\Flota;
use Modules\Flota\Entities\FleetInbound;
use Modules\Flota\Entities\CarCreate;
use Pingpong\Modules\Routing\Controller;
use Artisaninweb\SoapWrapper\Facades\SoapWrapper;
use Datatables;
use App\Http\Requests;
use Illuminate\Http\Request;
use Carbon\Carbon;

class FlotaController extends Controller {

    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        /*$user = Sentinel::getUser();
        dd($user->plaza_matriz_id);*/
        return view('flota::vehiculos.index');
    }

    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function anyData(Request $request)
    {
        if(Sentinel::check()){
            if(Sentinel::hasAccess('vehiculos.view')){

                /*$flotas = \DB::table('flotilla_inventario')
                    ->select(['flotilla_inventario.ID','flotilla_inventario.clave', 'flotilla_inventario.grupo',
                    'flotilla_inventario.cia_seguros',
                    'flotilla_inventario.clave_int',
                    'flotilla_inventario.tipo',
                    'flotilla_inventario.modelo',
                    'flotilla_inventario.marca',
                    'flotilla_inventario.color',
                    'flotilla_inventario.serie',
                    'flotilla_inventario.placas',
                    'flotilla_inventario.plaza_contable'])
                    ->leftjoin('flotilla_bitacora','flotilla_inventario.clave','=','flotilla_bitacora.clave')
                    ->where('flotilla_bitacora.status', '<>', '96');
                $datatables =  Datatables::of($flotas)
                     ->addColumn('action', function ($flota) {

                        return '<a href="editar/'.$flota->ID.'" id="'.$flota->ID.'" class="btn-info" title="Editar" data-toggle="tooltip" data-url=""><i class="glyphicon glyphicon-edit"></i></a>
                        <a href="eliminar/'.$flota->ID.'" id="'.$flota->ID.'" data-btn-type="delete" class="btn-danger" data-title="Eliminar" data-toggle="confirmation" data-singleton="true"><i class="glyphicon glyphicon-trash"></i></a>
                        <a href="repush/'.$flota->ID.'" id="'.$flota->ID.'" id="'.$flota->ID.'" class="btn-info" title="Re push" data-toggle="tooltip"><i class="glyphicon glyphicon-upload"></i></a>';
                    })
                    ->editColumn('ID', 'ID: @{{$ID}}');
                if ($operator = $request->get('operator')) {
                    $datatables->where('flotilla_inventario.plaza_contable', 'like', "$operator%"); // additional users.name search
                }
                return $datatables->make(true);*/
                $flotas = \DB::table('flotilla_bitacora as b')

                    ->select('o.oficinainternacional','b.clave','i.modelo','i.placas', (\DB::raw("if(b.prestamo=1,concat('Prestamo a la Plaza ',o.plaza),if(o.plaza=op.plaza,'Propio' ,concat('Se ubica en la plaza ',o.plaza))) Propiedad")), 'b.status', 'fe.descripcion', 'b.fecha_status' )
                    ->distinct()
                    ->join(\DB::raw('(SELECT p2.clave, max(p.fecha_status)fecha, max(p2.ultima_modificacion)fum FROM (SELECT clave, max(fecha_status)fecha_status FROM flotilla_bitacora WHERE date_format(fecha_status, "%Y-%m-%d")<= CURDATE() GROUP BY clave )p JOIN (select * from larusv2.flotilla_bitacora where fecha_status=CURDATE()) p2 ON p2.clave = p.clave AND p2.fecha_status = p.fecha_status	GROUP BY p2.clave)f'), function($join)
                    {
                        $join->on('f.clave', '=', 'b.clave');
                        $join->on('f.fecha', '=', 'b.fecha_status');
                        $join->on('f.fum', '=', 'b.ultima_modificacion');
                    })
                    ->leftjoin(\DB::raw("(SELECT DISTINCT plaza,oficinainternacional from Tb_Oficinas)o "), function($join)
                    {
                        $join->on('o.oficinainternacional', '=', 'b.plaza');
                    })
                    ->leftjoin('flotilla_status as fe','fe.status','=','b.status')
					->leftjoin('flotilla_inventario as i','i.clave','=','b.clave')
	                ->leftjoin(\DB::raw("(SELECT DISTINCT plaza,oficinainternacional from Tb_Oficinas)op "), function($join)
	                {
	                    $join->on('op.oficinainternacional', '=', 'i.plaza_contable');
	                })		
					->leftjoin('locaciones_plaza as lg','lg.nopza','=','op.plaza')
                    ->leftjoin('larus_usuario as u','u.id','=','lg.gerente')
				    ->leftjoin('Tb_Plazas as p','p.Clave','=','o.plaza')
					->leftjoin('Tb_Plazas as p2','p2.Clave','=','op.plaza');

		        $datatables =  Datatables::of($flotas)
		            ->addColumn('action', function ($flota) {

		            return '<a href="editar/'.$flota->clave.'" id="'.$flota->clave.'" class="btn btn-info" title="Editar" data-toggle="tooltip" data-url=""><i class="glyphicon glyphicon-edit"></i></a><a href="https://larus.nationalcar.com.mx/pruebas/tsd/cargaFlotilla.php?auto='.$flota->clave.'&ok=OK" id="'.$flota->clave.'" id="'.$flota->clave.'" class="btn btn-info" title="Re push" data-toggle="tooltip"><i class="glyphicon glyphicon-upload"></i></a>';
		            })
		            ->editColumn('b.clave', 'Clave: @{{$clave}}');
		            if ($operator = $request->get('operator')) {
		               $datatables->where('o.oficinainternacional', 'like', "$operator%"); // additional users.name search
		            }
					if ($operator_clave = $request->get('operator_clave')) {
                       $datatables->where('b.clave', 'like', "$operator_clave%"); // additional bajas search
	                }
					if ($operator_serie = $request->get('operator_serie')) {
                       $datatables->where('i.serie', 'like', "$operator_serie%"); // additional bajas search
	                }
					if ($operator_motor = $request->get('operator_motor')) {
                       $datatables->where('i.motor', 'like', "$operator_motor%"); // additional bajas search
	                }
					if ($operator_placa = $request->get('operator_placa')) {
                       $datatables->where('i.placas', 'like', "$operator_placa%"); // additional bajas search
	                }
		        return $datatables->make(true);

            }

            alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
            return back();
        }else{
            return redirect('login');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function plazas()
    {
        if(Sentinel::check()){
            if(Sentinel::hasAccess('vehiculos.view')){

                $flotas = \DB::table('flotilla_inventario')
                    ->select(\DB::raw("(SELECT DISTINCT flotilla_inventario.plaza_contable from flotilla_inventario)"))
                    ->get();
                //dd($flotas);
                return view('flota::vehiculos.index', compact('flotas'));
            }

            alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
            return back();
        }else{
            return redirect('login');
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function reportes()
    {
        if(Sentinel::check()){
            if(Sentinel::hasAccess('reportes.view')){

                $flotas = \DB::table('flotilla_bitacora as b')

                    ->select('b.clave', 'i.modelo','i.placas', (\DB::raw("if(b.prestamo=1,concat('Prestamo Plaza ',op.plaza),if(o.plaza=op.plaza,'Propio' ,concat('De la Plaza ',op.plaza))) Propiedad")), 'b.status', 'fe.descripcion', 'b.fecha_status' )
                    ->distinct()
                    ->join(\DB::raw('(SELECT MAX(fecha_status)fecha,clave,max(ultima_modificacion)fum from flotilla_bitacora
                                    group by clave)f'), function($join)
                    {
                        $join->on('f.clave', '=', 'b.clave');
                        $join->on('f.fecha', '=', 'b.fecha_status');
                        $join->on('f.fum', '=', 'b.ultima_modificacion');
                    })
                    ->leftjoin(\DB::raw("(SELECT DISTINCT plaza,oficinainternacional from Tb_Oficinas)o "), function($join)
                    {
                        $join->on('o.oficinainternacional', '=', 'b.plaza');
                    })
                    ->leftjoin('flotilla_status as fe','fe.status','=','b.status')
                    ->leftjoin('locaciones_plaza as lg','lg.nopza','=','o.plaza')
                    ->leftjoin('larus_usuario','larus_usuario.id','=','lg.gerente')
                    ->leftjoin('flotilla_inventario as i','i.clave','=','b.clave')
                    ->leftjoin(\DB::raw("(SELECT DISTINCT plaza,oficinainternacional from Tb_Oficinas)op "), function($join)
                   {
                       $join->on('op.oficinainternacional', '=', 'i.plaza_contable');
                   })

                    ->where('larus_usuario.id','=','132')
                    ->get();
               // dd($flotas);


                return view('flota::reportes1.index', compact('flotas'));
            }

            alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
            return back();
        }else{
            return redirect('login');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function reportes2()
    {
        if(Sentinel::check()){
            if(Sentinel::hasAccess('reportes.view')){

                $flotas = \DB::table('flotilla_bitacora as b')


                    ->select('b.clave', 'i.modelo','i.placas', (\DB::raw("if(b.prestamo=1,concat('Prestamo a la Plaza ',o.plaza),if(o.plaza=op.plaza,'Propio' ,concat('Se ubica en la Plaza ',o.plaza))) Propiedad")), 'b.status', 'fe.descripcion', 'b.fecha_status' )
                    ->join(\DB::raw('(SELECT MAX(fecha_status)fecha,clave,max(ultima_modificacion)fum from flotilla_bitacora
                                    group by clave)f'), function($join)
                    {
                        $join->on('f.clave', '=', 'b.clave');
                        $join->on('f.fecha', '=', 'b.fecha_status');
                        $join->on('f.fum', '=', 'b.ultima_modificacion');
                    })
                    ->leftjoin('Tb_Oficinas as o','o.oficinainternacional','=','b.plaza')
                    ->leftjoin('flotilla_status as fe','fe.status','=','b.status')
                    ->leftjoin('flotilla_inventario as i','i.clave','=','b.clave')
                    ->leftjoin('Tb_Oficinas as op','op.oficinainternacional','=','i.plaza_contable')
                    ->leftjoin('locaciones_plaza as lg','lg.nopza','=','op.plaza')
                    ->leftjoin('larus_usuario as u','u.id','=','lg.gerente')


                    ->where('u.id','=','132')
                    ->get();
                // dd($flotas);


                return view('flota::reportes2.index', compact('flotas'));
            }

            alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
            return back();
        }else{
            return redirect('login');
        }
    }


    /**
     * display de specified resource
     */
    public function show($id)
    {
        return 'Mostrar edicion: ' . $id;
        /*$flotam = Unidad::findOrFail($id);
        return view('flota::vehiculos.edit', compact('flotam'));*/
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
		//return view('flota::vehiculos.create');
		$estatus = Estatus_activo::all()->lists('descripcion', 'activo');
		$status = Status::all()->lists('descripcion', 'status');
		$site = Plaza::distinct('Oficina')->orderby('Oficina')->lists('Oficina','Oficina');
        return view('flota::vehiculos.create', compact('flotam','estatus','status','site'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(FlotaRequest $request)
    {

        $flotam = new Unidad($request->all());
        $flotam->save();
        flash()->success('El auto ha sido añadido.');
        //return redirect()->route('flota.vehiculos.index');
        return view('flota::vehiculos.index');

        //$this-> sincronizaTsd();
        //$this->sincronizaTsd();

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $flotam = Unidad::findOrFail($id);
		$estatus = Estatus_activo::all()->lists('descripcion', 'activo');
        return view('flota::vehiculos.edit', compact('flotam','estatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    /*public function update(FlotaRequest $request, $id)
    {
        $flotam = Unidad::findOrFail($id);
        $flotam->update($request->all());
        flash()->success('El auto ha sido editado.');
        return redirect()->back();
    }*/
	public function update(Request $request, $id)
    {
	        $flotam = Unidad::findOrFail($id);

	        $mytime = Carbon::now();
	        $mytime->toDateTimeString();
	        $clave = $flotam->clave;

	        //dd($clave);

	        $results = \DB::table('flotilla_inventario')
	            ->where('clave', $clave )
	            ->where('activo', 0 )
	            ->where('in_service', null )
	            ->update(['in_service' => $mytime]);


	        $flotam->update($request->all());
	        flash()->success('El auto ha sido editado.');
	        return redirect()->back();
    }
	
	

    /**
     * re push method
     */
    public function Repush($id){
        $mytime = Carbon::now();
        $mytime->toDateTimeString();
        $flotam = Unidad::findOrFail($id);
        $flotam->fecha_envio=$mytime;
        $flotam->save();
        flash()->success('El auto ha sido puesto en cola de sincronizacion.');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $flotam = Unidad::findOrFail($id);
        $flotam->activo='0';
        $flotam->save();
        flash()->success('El auto ha sido eliminado.');
        return redirect()->back();
        //return redirect()->route('flota.vehiculos.index');

        /*$flotam->delete();
        flash()->success('El auto ha sido eliminado.');
        return redirect()->route('flota.vehiculos.index');*/
    }

    /**
     * obtiene la informción de la flota que se captura en el formulario de flotilla
     * para posteriormente mandarla a TSD a traves de SOAP de PHP
     *
     */

   public function GetInfo(){




        $flotas = \DB::table('flotilla_inventario_import')
            ->select('clave as CLAVE',
                'marca as DESCRIPCION',
                'grupo as GRUPO',
                'status as STATUS',
                'cia_seguros as CIA_SEGUROS',
                'clave_int as CLAVE_INT',
                'tipo as TIPO',
                'modelo as MODELO',
                'marca as MARCA',
                'capacidad_gas as CAPACIDAD_GAS',
                'gas as GAS',
                'color as COLOR',
                'serie as SERIE',
                'placas as PLACAS',
            \DB::raw("CONCAT(LEFT (`fvenc_placas`, 10),
                'T',
                RIGHT (`fvenc_placas`, 8),
                '.000Z'
            ) as FVENC_PLACAS"),
            \DB::raw("CONCAT(
                LEFT (`fvenc_verif`, 10),
                'T',
                RIGHT (`fvenc_verif`, 8),
                '.000Z'
            ) as FVENC_VERIF"),
            \DB::raw("CONCAT(
                LEFT (`fvenc_verif`, 10),
                'T',
                RIGHT (`fvenc_verif`, 8),
                '.000Z'
            ) as FVENC_CALC"),
            \DB::raw("CONCAT(
                LEFT (`in_service`, 10),
                'T',
                RIGHT (`in_service`, 8),
                '.000Z'
            ) as IN_SERVICE"),
                'km_servicio as KM_SERVICIO',
                'km as KM',
                'plaza as PLAZA',
                'plaza_contable as PLAZA_CONTABLE',
                'deduciblematerial as DEDUCIBLEMATERIAL',
                'deduciblerobo as DEDUCIBLEROBO',
                'fleet_type as FLEET_TYPE')
            ->where('clave','=','63301')
            ->get();
            /*dd($flotas->toSql());
            $flotas=$flotas->get();*/

        /*foreach ($flotas as $row){
            return $row;
        }*/

        //dd($flotas);

        return $flotas;

    }


    /**
     * Arma el objeto FleetInbound
     *
     */
    public function ArmaFleetInbound(){
        /*$CarCreate = ['CarCreate' => $this->sincronizaTsd()];
        $flota = ['Flota' => $CarCreate];*/

        $flota = new Flota();
        $flota->CarCreate = $this->GetInfo();

        $carCreate = new CarCreate();
        $carCreate->CarCreate = $flota;

        $fleetInbound = new FleetInbound($flota);
        //$fleetInbound->Flota = $flota;

        //dd($fleetInbound);
        return $fleetInbound;
    }



    /**
     * sincroniza el auto de flota con TSD  a traves de SOAP de PHP
     *
     */

    public function sincronizaTsd(){

        $fleetInbound=  $this->ArmaFleetInbound();

        //dd($fleetInbound);



        $client = new \SoapClient('tsdrms.net.wsvcMXAntyr_o3.wsdl',
        array('soap_version'=>SOAP_1_1,
        'exceptions'=>true,
        'trace'=>true,
        'cache_wsdl'=>WSDL_CACHE_NONE,
        'classmap' => array('FleetInbound'=>'FleetInbound','Flota'=>'Flota','CarCreate'=>'CarCreate','CompanyInbound'=>'CompanyInbound','Empresa'=>'Empresa','Empresas'=>'Empresas')
         )
        );

        $client->FleetInbound($fleetInbound);

        /*dd($client->__getLastResponseHeaders(),"RESPONSE HEADERS");
        dd($client->__getLastRequestHeaders(),"REQUEST HEADERS");
        dd($client->__getLastRequest(),"REQUEST CONTENT");
        dd($client->__getLastResponse(),"RESPONSE CONTENT");*/

        /*var_dump($client->__getLastRequestHeaders());
        var_dump($client->__getLastRequest());
        var_dump($client->__getLastResponseHeaders());
        var_dump($client->__getLastResponse());*/
        /*var_dump($client);
        die();*/


       dd($client, "FLEET INBOUND");

    }


    public function Sincroniza()
    {

        $fleetInbound=  $this->ArmaFleetInbound();


        SoapWrapper::add(function ($service) {
            $service
                ->name('LARUS2')
                ->wsdl('tsdrms.net.wsvcMXAntyr_o3.wsdl')
                ->trace(true)                                                   // Optional: (parameter: true/false)

                ->cache(WSDL_CACHE_NONE);                                       // Optional: Set the WSDL cache

        });

        $data = [
                            'CLAVE' => '63301',
                            'DESCRIPCION' => '',
                            'GRUPO' => 'PATR',
                            'STATUS' => '2',
                            'CIA_SEGUROS' => 'Qualitas',
                            'CLAVE_INT' => 'IFAR',
                            'TIPO' => 'Y',
                            'MODELO' => 'JEEP PATRIOT',
                            'MARCA' => 'JEEP' ,
                            'CAPACIDAD_GAS' => '60',
                            'GAS' => '1.00',
                            'COLOR' => 'BLANCO',
                            'SERIE' => '1C4AJPAB5GD754220',
                            'PLACAS' => 'SIN PLACAS',
                            'FVENC_PLACAS' => '2017-03-31T00:00:00.000Z',
                            'FVENC_CALC' => '2017-05-30T00:00:00.000Z',
                            'FVENC_VERIF' => '2017-05-30T00:00:00.000Z',
                            'KM_SERVICIO' => '15000',
                            'KM' => '0',
                            'PLAZA' => 'SLPC02',
                            'PLAZA_CONTABLE' => 'SLPC02',
                            'DEDUCIBLEMATERIAL' => '5.00',
                            'DEDUCIBLEROBO' => '10.00',
                            'IN_SERVICE' => '2016-04-25T00:00:00.000Z',
                            'FLEET_TYPE' => 'R1'
        ];



        // Using the added service
        SoapWrapper::service('LARUS2', function ($service) use ($data) {
            var_dump($service->getFunctions());
            var_dump($service->call('FleetInbound', [$data]));
            var_dump($service);
        });
    }



 }








