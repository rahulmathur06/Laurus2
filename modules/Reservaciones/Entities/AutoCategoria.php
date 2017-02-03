<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class AutoCategoria extends Model {
    /**
     * @var string
     */
    protected static $translateModel = 'Modules\Reservaciones\Entities\AutoCategoriaTraduccion';

    /**
     * Model name Auto Categorias
     * @var string
     */
    protected static $claseModel = 'Module\Reservaciones\Entities\AutoClases';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_autos_categorias';
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function clases(){
        return $this->hasMany(static::$claseModel);
    }

    /**
     * @param null $language
     * @return mixed
     */
    public function translation($language = null){
        return $this->hasMany(static::$translateModel,'categoria_id')->where('idioma',$language);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function translate(){
        return $this->hasMany(static::$translateModel,'categoria_id');
    }

}