<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Impuestos extends Model {

    protected $fillable = ['tax_factor','airport_fee'];
    protected  $table ='mv3_reservaciones_impuestos';
    
    public $timestamps = false;

}