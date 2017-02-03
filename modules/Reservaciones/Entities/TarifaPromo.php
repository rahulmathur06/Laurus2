<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class TarifaPromo extends Model {

    protected $fillable = ['tarifa_id', 'factor_promo', 'tipo_factor', 'fecha_inicio', 'fecha_fin', 'precio_rack_id'];
    
    protected  $table ='mv3_tarifa_promocion';
    
    public $timestamps = false;

}