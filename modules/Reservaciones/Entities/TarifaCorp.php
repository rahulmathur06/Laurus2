<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class TarifaCorp extends Model {

    protected $fillable = ['tarifa_id', 'person_type'];
    
    protected  $table ='mv3_tarifa_corp';
    
    public $timestamps = false;

}