<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class DropOffUbicacion extends Model {

    protected $fillable = ['ciudad_pickup_id', 'ciudad_dropoff_id', 'distancia'];
    
    protected $table = 'mv3_locaciones_dropoff';
    
    public $timestamps = false;
    
    public function dropOffLocacion(){
        return $this->belongsTo('Modules\Reservaciones\Entities\Locacion', 'ciudad_dropoff_id');
    }
    
    public function pickupLocacion(){
        return $this->belongsTo('Modules\Reservaciones\Entities\Locacion', 'ciudad_pickup_id');
    }
}