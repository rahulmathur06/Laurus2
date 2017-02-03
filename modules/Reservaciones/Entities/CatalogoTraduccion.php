<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class CatalogoTraduccion extends Model {
    /**
     * @var array
     */
    protected $idioma = [
        'es-MX' => 'Español',
        'en-US' => 'Ingles'
    ];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_traducciones_catalogos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['catalogo_id','idioma','nombre','descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clase(){
        return $this->belongsTo('Modules\Reservaciones\Entities\Catalogo');
    }

    /**
     * @return lenguage
     */
    public function getIdioma(){
        return $this->idioma;
    }


}