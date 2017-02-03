<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Convenio extends Model {

    protected $value = [
        '0' => 'No',
        '1' => 'Si'
    ];
    /**
     * @var string
     * model name acceso
     */
    protected static $accesoModel ='Modules\Reservaciones\Entities\Acceso';
    /**
     * Diferentes tipos de convenios
     * @var array
     */
    protected $types = [
        'Interno' => 'Interno',
        'Empresarial' => 'Empresarial',
        'Agencia' => 'Agencia',
        'Mayorista' => 'Mayorista'
    ];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_convenio_config';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_empresa',
        'nombre',
        'descripcion',
        'acronimo',
        'idioma',
        'moneda',
        'horas_tolerancia',
        'dias_semana',
        'dias_mes',
        'tipo',
        'prepago_habilitado',
        'descuento_ppgo_habilitado',
        'activo'
    ];

    /**
     * @return array tipos
     */
    public function getTypes(){
        return $this->types;
    }

    public function getValue(){
        return $this->value;
    }
    /**
     * N:1
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function access(){
        return $this->hasMany(static::$accesoModel);
    }

    /**
     * @param $value Activo
     * @return string
     */
   /* public function getActivoAttribute($value){
        return ($value ? 'Si' : 'No');
    }*/

    /**
     * @param $value prepago habilitado
     * @return string
     */
  /*  public function getPrepagoHabilitadoAttribute($value){
        return ($value ? 'Si' : 'No');
    }*/

    /**
     * @param $value descuento prepago habilitado
     * @return string
     */
   /* public function getDescuentoPpgoHabilitadoAttribute($value){
        return ($value ? 'Si' : 'No');
    }*/

}