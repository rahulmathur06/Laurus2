<?php namespace Modules\Flota\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Datatables;
use Illuminate\Http\Request;
use App\Http\Requests;

class ReporteInventarioController extends Controller {

    /**
     * Displays datatables front end view
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return view('flota::reportes2.index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function anyData(Request $request)
    {
        if(Sentinel::check()){
            if(Sentinel::hasAccess('inventario.view')){
                $flotas = \DB::table('flotilla_bitacora as b')

                    ->select('o.plaza as ClaveU', 'p.Nombre as Ubicado','op.plaza as ClaveP','p2.Nombre as Pertenece', 'o.oficinainternacional as oficina', 'b.clave', 'i.modelo', 'i.placas',(\DB::raw("if(b.prestamo=1,concat('Prestamo a la Plaza ',b.pplaza),if(o.plaza=op.plaza,'Propio' ,concat('Se ubica en la Plaza ',o.plaza))) Propiedad")), 'b.status', 'fe.descripcion', 'b.fecha_status' )
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
                    ->leftjoin('flotilla_inventario as i','i.clave','=','b.clave')

                    ->leftjoin(\DB::raw("(SELECT DISTINCT plaza,oficinainternacional from Tb_Oficinas)op "), function($join)
                    {
                        $join->on('op.oficinainternacional', '=', 'i.plaza_contable');
                    })
                    ->leftjoin('locaciones_plaza as lg','lg.nopza','=','op.plaza')
                    ->leftjoin('larus_usuario as u','u.id','=','lg.gerente')
                    ->leftjoin('Tb_Plazas as p','p.Clave','=','o.plaza')
                    ->leftjoin('Tb_Plazas as p2','p2.Clave','=','op.plaza');
                    //->where('b.status', '<>', '96');
                $datatables =  Datatables::of($flotas);
				
				
                if ($operator_oficina = $request->get('operator_oficina')) {
                    $datatables->where('o.oficinainternacional', 'like', "$operator_oficina%"); // additional oficina search
                }
                if ($operator_plaza = $request->get('operator_plaza')) {
                    $datatables->where('op.plaza', 'like', "$operator_plaza%"); // additional plaza search
                }
                if ($operator_bajas = $request->get('operator_bajas')) {
                    $datatables->where('b.status', 'like', "$operator_bajas%"); // additional bajas search
                }
                if ($operator_otras = $request->get('operator_otras')) {
                    $datatables->having('Propiedad', 'like', "$operator_otras%"); // additional otras plazas search
                }
                if ($operator_prestadas = $request->get('operator_prestadas')) {
                    $datatables->having('Propiedad', 'like', "$operator_prestadas%"); // additional prestadas search
                }
				if ($operator_sin_bajas = $request->get('operator_sin_bajas')) {
                    $datatables->where('b.status', 'not like', "$operator_sin_bajas%"); // additional sin bajas search
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
     * display de specified resource
     */
    public function show($id)
    {
        return 'Mostrar edicion: ' . $id;
        /*$flotam = Unidad::findOrFail($id);
        return view('flota::vehiculos.edit', compact('flotam'));*/
    }
	
}