<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class TrackPrecio extends Model {

    protected $fillable = ['clave_sipp', 'tarifa', 'tarifa_id'];
    
    protected  $table ='mv3_track_precio';
    
    public $timestamps = false;
    
    protected $primaryKey = 'tarifarack_id';

}