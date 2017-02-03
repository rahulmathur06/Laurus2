<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class SeguroTarifas extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_seguros_pcode_coberturas_tarifas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','plan_code','descripcion','cdw','tpl','pai','dp'];

    // setters
    public function setNombreAttribute($value){
        $this->attributes['nombre'] = strtoupper($value);
    }
    public function setPlanCodeAttribute($value){
        $this->attributes['plan_code'] = strtoupper($value);
    }

}