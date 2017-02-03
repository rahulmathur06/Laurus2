<?php namespace Modules\Flota\Entities;
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 8/25/16
 * Time: 7:26 PM
 */

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class Estatus_activo extends Model{


    protected $table = "flotilla_estatus_de_activo";
    protected $primaryKey = 'id';
    public $timestamps = false;









} 