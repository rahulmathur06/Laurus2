<?php namespace Modules\Test\Http\Controllers;

use Pingpong\Modules\Routing\Controller;

class Test2 extends Controller {
	
	public function index()
	{
		return view('Test::index');
	}
	
}