<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class AutoCategoriaTraduccion extends Model {

    protected $idioma = [
        'es-MX' => 'Español',
        'en-US' => 'Ingles'
    ];

    protected $fillable = ['categoria_id','idioma','nombre'];

    protected $table = 'mv3_traducciones_categorias';
    /**
     * @return array
     */
    public function getIdioma(){
        return $this->idioma;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categoria(){
        return $this->belongsTo('Modules\Reservaciones\Entities\AutoCategoria');
    }

}