<?php namespace Modules\CuentasCorporativas\Entities;
   
use Illuminate\Database\Eloquent\Model;

class ConvenioChklist extends Model {

    protected $fillable = ['convenio_id','checklist_id','vigencia','nomarchivo','ruta'];
    protected  $table ='convenios_convenio_chklist';
    public $timestamps = false;
}