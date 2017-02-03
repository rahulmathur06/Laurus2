<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class TcorpPrecio extends Model {

    protected $fillable = ['clave_sipp', 'tarifa', 'tarifa_id'];
    
    protected  $table ='mv3_tcorp_precio';
    
    public $timestamps = false;
    
    protected $primaryKey = 'precio_code_id';
}