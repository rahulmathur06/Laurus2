<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class AutoClases extends Model {
    /**
     * @var string
     */
    protected static $translateModel = 'Modules\Reservaciones\Entities\ClaseTraducciones';
    /**
     * @var array
     */
    protected $group = [
        'ANTYR' => 'ANTYR',
        'BEPENSA' => 'BEPENSA'
    ];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_autos_clases';
    /**
     * @var array
     */
    protected $fillable = ['categoria_id','clase','sipp','prioridad','grupo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria(){
        return $this->belongsTo('Modules\Reservaciones\Entities\AutoCategoria','categoria_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flotilla(){
        return $this->hasMany('Module\Reservaciones\Entities\Flotilla','clase_id');
    }

    /**
     * @param null $language
     * @return mixed
     */
    public function translation($language = null){
        return $this->hasMany(static::$translateModel,'clase_id')->where('idioma', '=', $language);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translate(){
        return $this->hasMany(static::$translateModel,'clase_id');
    }

    /**
     * @return groups
     */
    public function getGroups(){
        return $this->group;
    }

    /**
     * @param $value clase mayusculas
     */
    public function setClaseAttribute($value){
        $this->attributes['clase'] = strtoupper($value);
    }

    public function setSippAttribute($value){
        $this->attributes['sipp'] = strtoupper($value);
    }


}