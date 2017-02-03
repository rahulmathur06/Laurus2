<?php

namespace Modules\CuentasCorporativas\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use DB;

class CuentasCorporativasController extends Controller {

    public function index() {
        return view('Cuentascorporativas::index');
    }

    public function getStateToCity() {
        $sID = $_REQUEST['stateid'];
        $city = DB::table('Mexico_Ciudades')->where('Estado_ID', $sID)->lists('NOMBRE', 'NOMBRE');
        echo view('cuentascorporativas::empresas.partials.statetocity', compact('city'));
    }

}
