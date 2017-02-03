<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class TarifaListado extends Model {

    protected $fillable = ['nombre','descripcion','tipo','status','f_ini','f_fin','moneda','autorizacion'];
    
    protected $table = 'mv3_tarifas_listado';
    
    public $timestamps = false;
    
    const TIPO_TARIFA_RACK = 1;
    const TIPO_TARIFA_CORP = 2;
    const TIPO_TARIFA_TEMP = 3;
    const TIPO_TARIFA_PROMO = 4;
    
    public function details(){
        switch($this->tipo){
            case self::TIPO_TARIFA_RACK:
                return $this->hasOne('Modules\Reservaciones\Entities\TarifaRack', 'tarifa_id');
            case self::TIPO_TARIFA_CORP:
                return $this->hasMany('Modules\Reservaciones\Entities\TarifaCorp', 'tarifa_id');
            case self::TIPO_TARIFA_TEMP:
                return $this->hasMany('Modules\Reservaciones\Entities\TarifaTemporada', 'tarifa_id');
            case self::TIPO_TARIFA_PROMO:
                return $this->hasMany('Modules\Reservaciones\Entities\TarifaPromo', 'tarifa_id');
            default:
                return null;
        }
    }
    
    public function prices(){
        switch($this->tipo){
            case self::TIPO_TARIFA_RACK:
                return $this->hasMany('Modules\Reservaciones\Entities\TrackPrecio', 'tarifa_id');
            case self::TIPO_TARIFA_CORP:
                return $this->hasMany('Modules\Reservaciones\Entities\TcorpPrecio', 'tarifa_id');
            default:
                return null;
        }
    }

}