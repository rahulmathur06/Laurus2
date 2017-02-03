<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class ClaseTraducciones extends Model {

    protected $idioma = [
        'es-MX' => 'Español',
        'en-US' => 'Ingles'
    ];

    protected $table = 'mv3_traducciones_clases';
    protected $fillable = ['clase_id','idioma','nombre','descripcion'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clase(){
        return $this->belongsTo('Modules\Reservaciones\Entities\AutoClases');
    }

    /**
     * @return array
     */
    public function getIdioma(){
        return $this->idioma;
    }




}