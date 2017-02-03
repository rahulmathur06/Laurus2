<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Catalogo extends Model {
    /**
     * Model catalogo translate
     * @var string
     */
    protected static $translateModel = 'Modules\Reservaciones\Entities\CatalogoTraduccion';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_seguros_catalogos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['clave'];

    /**
     * @param null $language
     * @return mixed
     */

    public function translation($language = null){
        return $this->hasMany(static::$translateModel,'catalogo_id')->where('idioma', $language);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translate(){
        return $this->hasMany(static::$translateModel,'catalogo_id');
    }

    /**
     * @param $value
     */
    public function setClaveAttribute($value){
        $this->attributes['clave'] = strtoupper($value);
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Coberturas(){
        return $this->belongsToMany('Modules\Reservaciones\Entities\Cobertura','seguros_catalogos_coberturas','cobertura_id','catalogo_id');
    }
}