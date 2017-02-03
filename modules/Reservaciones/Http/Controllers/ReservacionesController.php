<?php namespace Modules\Reservaciones\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class ReservacionesController extends Controller {
	
	public function index()
	{
		return view('reservaciones::index');
	}
	
}