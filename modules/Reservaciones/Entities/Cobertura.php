<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Cobertura extends Model {
    /**
     * Catalogo model name
     * @var string
     */
    protected static $catalogModel = 'Modules\Reservaciones\Entities\Catalogo';

    protected static $traduccionModel = 'Modules\Reservaciones\Entities\CoberturaTraducciones';
    /**
     * @var string
     */
    protected $tipoCobertura = [
        '0' => 'Otro tipo',
        '1' => 'Cobertura web'
    ];

    /**
     * @var string
     */
    protected $table = 'mv3_seguros_coberturas';
    /**
     * @var array
     */
    protected $fillable = ['pcode','pcodetarifa','web'];

    /**
     * @param null $language
     * @return mixed
     */

    public function translation($language = null){
        return $this->hasMany(static::$traduccionModel,'cobertura_id')->where('idioma', '=', $language);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translate(){
        return $this->hasMany(static::$traduccionModel,'cobertura_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function catalogos(){
        return $this->belongsToMany(static::$catalogModel,'mv3_seguros_catalogos_coberturas','cobertura_id','catalogo_id');
    }
    /**
     * @return array
     */
    public function getCatalogos(){
        return Catalogo::all()->lists('clave','id');
    }

    public function getTipoCoberturas(){
        return $this->tipoCobertura;
    }

    /**
     * @param $id
     */
    public function addCatalogos($id){
        $this->catalogos()->sync($id);
    }

    /**
     * @param $value
     * @return string
     */
    public function getWebAttribute($value){
        return ($value ? 'Cobertura Web' : 'Cobertura de cualquier otro tipo de convenio');
    }

    public function setPCodeAttribute($value){
        $this->attributes['pcode'] = strtoupper($value);
    }
    public function setPCodeTarifaAttribute($value){
        $this->attributes['pcodetarifa'] = strtoupper($value);
    }


    public function scopeId($query){
        return $query->catalogos()->where('cobertura_id')->get();
    }

}
