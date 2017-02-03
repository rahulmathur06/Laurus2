<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Locacion extends Model {
    protected static $translateModel = 'Modules\Reservaciones\Entities\LocacionTraducciones';
    /**
     * Grupos
     * @var array
     */
    protected $group = [
        'ANTYR' => 'ANTYR',
        'BEPENSA' => 'BEPENSA'
    ];
    /**
     * @var array Activos
     */
    protected $activo =[
        '0' => 'No',
        '1' => 'Si'
    ];
    /**
     * @var array
     */
    protected $tipo = [
        'ciudad' => 'Ciudad',
        'aeropuerto' => 'Aeropuerto'
    ];
    /**
     * @var float
     */

    protected $iva = 0.16;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_locaciones_locacion';
    /**
     * @var array
     */

    protected $fillable = [
        'ciudad_id',
        'clave',
        'clave_jr',
        'grupo',
        'orden',
        'airportfee',
        'iva',
        'zoom',
        'centro_latitud',
        'centro_longitud',
        'direccion_google_maps',
        'imagen',
        'activo',
        'tipo_locacion',
        'latitud',
        'longitud'
    ];

    /**
     * @return groups
     */
    public function getGroups(){
        return $this->group;
    }

    /**
     * @return iva 0.16
     */
    public function getIva(){
        return $this->iva;
    }

    /**
     * @return activo si o no array
     */
    public function getActivo(){
        return $this->activo;
    }

    /**
     * @return array tipo de locacion
     */
    public function getTipo(){
        return $this->tipo;
    }

    /**
     * @param $value
     * @return string
     */
   /* public function getActivoAttribute($value){
        return ($value ? 'Si' : 'No');
    }*/

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function ciudad()
    {
        return $this->belongsTo('Modules\Reservaciones\Entities\Ciudad', 'ciudad_id');
    }

    /**
     * @param null $language
     * @return mixed
     */
    public function translation($language = null){
        return $this->hasMany(static::$translateModel,'locacion_id')->where('idioma', '=', $language);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translate(){
        return $this->hasMany(static::$translateModel,'locacion_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function direccion(){
        return $this->hasOne('Modules\Reservaciones\Entities\LocacionDireccion','locacion_id');
    }

    public function anticipaciones(){
        return $this->hasMany('Modules\Reservaciones\Entities\AutoClases','locacion_id');
    }

    public function restriccion(){
        return $this->hasOne('Modules\Reservaciones\Entities\HorariosRestriccion','locacion_id');
    }

    /**
     * Autos clases
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clases(){
        return $this->belongsToMany('Modules\Reservaciones\Entities\AutoClases','mv3_locaciones_autos','locacion_id','clase_id');
    }


    public function addClases($id){
        $this->clases()->sync($id);
    }

    /**
     * @param $value
     */
    public function setClaveAttribute($value){
        $this->attributes['clave'] = strtoupper($value);
    }


}