<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;
use PhpSpec\Exception\Exception;

class Destino extends Model{

    protected static $translateModel = 'Modules\Reservaciones\Entities\DestinoTraducciones';
    protected $table = 'mv3_locaciones_destinos';

    protected $fillable = ['estado_id', 'nombre', 'orden'];


    public function estado(){
        return $this->belongsTo('Modules\Reservaciones\Entities\Estado', 'estado_id');
    }

    public function translation($language = null){
        return $this->hasMany(static::$translateModel,'id_destino')->where('idioma', '=', $language);
    }

    public function translate(){
        return $this->hasMany( static::$translateModel, 'id_destino');
    }

    /**
     * Valid if has destinos
     * returb collection destinos
     * @throws Exception
     */
    public function hasDestinos(){
        $destinos = Destino::all()->lists('nombre','id');
        if(count($destinos) < 1){
           throw new Exception('Necesita crear un destino.');
        }
        return $destinos;
    }


}