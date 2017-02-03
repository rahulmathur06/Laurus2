<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class TarifaTemporada extends Model {

    protected $fillable = ['tarifa_id','nombre_temporada','fecha_inicio','fecha_fin','precio_rack_id'];
    
    protected  $table ='mv3_tarifa_temporada';
    
    public $timestamps = false;

}