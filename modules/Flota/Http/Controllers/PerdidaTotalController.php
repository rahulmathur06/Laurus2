<?php

namespace Modules\Flota\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Flota\Entities\FlotillaPerdidaTotal;
use Cartalyst\Sentinel\Native\Facades\Sentinel;
use Modules\Flota\Http\Requests\PerdidaTotalRequest;
use Modules\Flota\Http\Requests\PerdidaTotalEditRequest;
use Modules\User\Entities\User;
use Modules\Roles\Entities\Rol;
use DB;

class PerdidaTotalController extends Controller {

    protected $auth;

    public function __construct(FlotillaPerdidaTotal $FlotillaPerdidaTotal) {
        $this->FlotillaPerdidaTotal = $FlotillaPerdidaTotal;
        $this->auth = Sentinel::getUser();
    }

    public function index() {
        if (Sentinel::hasAccess('perdida.index')) {
            $flotillaPerdidaTotal = FlotillaPerdidaTotal::all();
            return view('flota::perdidatotal.index', compact('flotillaPerdidaTotal'));
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    public function create() {
        if (Sentinel::hasAccess('perdida.create')) {
            $ciudad = DB::table('Tb_Plazas')->lists('Nombre', 'Clave');

            $clave = DB::table('flotilla_inventario')->lists('clave', 'id');
            return view('flota::perdidatotal.create', compact('clave', 'recuperacion', 'ciudad'));
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    public function store(PerdidaTotalRequest $request) {
        if (Sentinel::hasAccess('perdida.create')) {
            $filleable = $request->only('clave', 'tipo_siniestro', 'sucursal', 'cliente', 'ciudad', 'comentarios', 'fecha_del_siniestro', 'tipo_siniestro', 'deducible', 'recuperacion', 'numReporte', 'cobertura', 'num_contrato', 'contrato_inicio', 'contrato_fin', 'description');
            $this->FlotillaPerdidaTotal->fill($filleable);
            $this->FlotillaPerdidaTotal->save();
            flash()->success('Creación exitosa.');
            return redirect()->to('perdida');
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    public function edit($id) {
        if (Sentinel::hasAccess('perdida.update')) {
            $flotillaPerdidaTotal = $this->FlotillaPerdidaTotal->find($id);
            $clave = DB::table('flotilla_inventario')->lists('clave', 'id');
            $ciudad = DB::table('Tb_Plazas')->lists('Nombre', 'Clave');
            return view('flota::perdidatotal.edit', compact('flotillaPerdidaTotal', 'clave', 'ciudad'));
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    public function update(PerdidaTotalEditRequest $request, $id) {
        if (Sentinel::hasAccess('perdida.update')) {
            $filleable = $request->only('clave', 'tipo_siniestro', 'sucursal', 'cliente', 'ciudad', 'comentarios', 'fecha_del_siniestro', 'tipo_siniestro', 'deducible', 'recuperacion', 'numReporte', 'cobertura', 'num_contrato', 'contrato_inicio', 'contrato_fin', 'description');
            // search FlotillaPerdidaTotals
            $FlotillaPerdidaTotals = $this->FlotillaPerdidaTotal->find($id);

            // fill data
            $FlotillaPerdidaTotals->fill($filleable);
            // save FlotillaPerdidaTotals
            $FlotillaPerdidaTotals->save();

            // message
            flash()->success('Actualización exitosa.');
            return redirect()->to('perdida');
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        if (Sentinel::hasAccess('perdida.destroy')) {
            try {
                $FlotillaPerdidaTotals = $this->FlotillaPerdidaTotal->find($id);
                $FlotillaPerdidaTotals->destroy($id);
                return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
            } catch (QueryException $e) {
                return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
            }
        }
        alert()->error('No tiene permisos para acceder a esta area.', 'Oops!')->persistent('Cerrar');
        return back();
    }

    public function getCityToBranch() {
        $clave = $_REQUEST['ciudad'];
        $branch = DB::table('Tb_Oficinas')->where('plaza', $clave)->lists('nombre', 'clave');
        echo view('flota::perdidatotal.partials.citytobranch', compact('branch'));
    }

}
