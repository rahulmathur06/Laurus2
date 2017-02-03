<?php

namespace Modules\Reservaciones\Entities;

use Illuminate\Database\Eloquent\Model;

class PromoLocacionClase extends Model {

    protected $fillable = ['loc_pom_id', 'clase_id'];
    protected $table = 'mv3_promo_locacion_clase';
    public $timestamps = false;
    
    public function locacion(){
        return $this->belongsTo('Modules\Reservaciones\Entities\PromoLocacion', 'loc_pom_id');
    }

}
