<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class DropOffCosto extends Model {

    protected $fillable = ['fecha_ini', 'fecha_fin', 'valor_mxn', 'valor_usd'];
    
    protected $table = 'mv3_locaciones_dropoff_costos';
    
    public $timestamps = false;
}