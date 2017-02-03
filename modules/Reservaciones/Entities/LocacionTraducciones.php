<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class LocacionTraducciones extends Model {
    protected $table = 'mv3_traducciones_locacion';
    protected $fillable = ['locacion_id','idioma','nombre'];
    protected $idioma = [
        'es-MX' => 'Español',
        'en-US' => 'Ingles'
    ];

    /**
     * @return lenguage
     */
    public function getIdioma(){
        return $this->idioma;
    }

    public function locacion(){
        return $this->belongsTo('Modules\Reservaciones\Entities\Locacion','locacion_id');
    }

}