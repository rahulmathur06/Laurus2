<?php namespace Modules\CuentasCorporativas\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Convenios extends Model {

    protected $fillable = ['convenio_descripcion','duracion','tarifa_id','seguro_id','empresa_id','tipo_convenio'];
    protected  $table ='convenios_convenio';
    public $timestamps = false;

}