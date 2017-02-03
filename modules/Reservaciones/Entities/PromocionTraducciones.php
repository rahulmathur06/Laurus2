<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class PromocionTraducciones extends Model {

    protected $table = 'mv3_traducciones_promocion';
    /**
     * @var array
     */
    protected $fillable = [
        'promocion_id',
        'idioma',
        'nombre',
        'intro',
        'contenido',
        'restricciones',
        'url','url_banner_home','url_banner','url_banner_locacion','url_blast','titulo_destino'
    ];
    public function promocion(){
        return $this->belongsTo('Modules\Reservaciones\Entities\Promocion');
    }

}