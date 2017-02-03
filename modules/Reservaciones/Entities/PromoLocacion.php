<?php

namespace Modules\Reservaciones\Entities;

use Illuminate\Database\Eloquent\Model;

class PromoLocacion extends Model {

    protected $fillable = ['locacion_id', 'promo_id'];
    protected $table = 'mv3_promo_locacion';
    public $timestamps = false;
    
    public function clases(){
        return $this->hasMany('Modules\Reservaciones\Entities\PromoLocacionClase', 'loc_pom_id');
    }
    
    public function promo(){
        return $this->belongsTo('Modules\Reservaciones\Entities\PromoListado');
    }

}
