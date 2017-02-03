<?php namespace Modules\CuentasCorporativas\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Checklist extends Model {
    
     protected static $personTipo = 'Modules\CuentasCorporativas\Entities\PersonasTipo';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'convenios_checklist';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id','documento','tipo_persona_id','tipo_convenio_id','orden','requerido','validar_fecha'];

   
}