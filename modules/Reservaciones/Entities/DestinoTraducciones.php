<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class DestinoTraducciones extends Model {
    /**
     * @var array
     */
    protected $idioma = [
        'es-MX' => 'Español',
        'en-US' => 'Ingles'
    ];
    protected $table = 'mv3_traducciones_destinos';

    protected $fillable = ['id_destino','idioma','mensaje'];



    public function destino(){
        return $this->belongsTo('Modules\Reservaciones\Entities\Destino','id_destino');
    }
    /**
     * @return lenguage
     */
    public function getIdioma(){
        return $this->idioma;
    }
}