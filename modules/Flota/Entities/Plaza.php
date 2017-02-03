<?php namespace Modules\Flota\Entities;
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 8/25/16
 * Time: 7:26 PM
 */

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class Plaza extends Model{

    protected $table = "Tb_Plazas";
    protected $primaryKey = 'Clave';
    public $timestamps = false;
	
	/*public function plaza(){
		return $result = \DB::select('SELECT DISTINCT plaza_contable from flotilla_inventario order by plaza_contable');
	}*/
	

	//return $results;

} 