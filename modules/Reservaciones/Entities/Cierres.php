<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Cierres extends Model {

    protected $fillable = ['locacion_id','auto_id','fecha_ini','fecha_fin','motivo'];
    protected  $table ='mv3_reservaciones_cierres';
    
    public $timestamps = false;
}