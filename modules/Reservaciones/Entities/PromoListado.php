<?php

namespace Modules\Reservaciones\Entities;

use Illuminate\Database\Eloquent\Model;

class PromoListado extends Model {

    protected $fillable = ['promocode', 'descripcion', 'tipo_promo', 'fechaini', 'fechafin', 'factor_mxm', 'factor_dpor', 'factor_ddia', 'factor_dcant', 'activo'];
    protected $table = 'mv3_promo_listado';
    public $timestamps = false;
    protected $factor_indices = [1 => 'factor_mxm', 2 => 'factor_dpor', 3 => 'factor_ddia', 4 => 'factor_dcant'];

    public function locations() {
        return $this->hasMany('Modules\Reservaciones\Entities\PromoLocacion', 'promo_id');
    }

    //get factor value for the promo type
    //Make sure to set the promo type first or error will be thrown
    public function getFactorValue() {
        if (!isset($this->tipo_promo))
            return null;
        $factor_index = $this->factor_indices[$this->tipo_promo];
        return $this->$factor_index;
    }

    //set factor value for the promo type
    //Make sure to set the promo type first or error will be thrown
    public function setFactorValue($factor) {
        if (isset($this->tipo_promo)) {
            $factor_index = $this->factor_indices[$this->tipo_promo];
            switch (gettype($factor)) {
                case 'array':
                    $this->$factor_index = isset($factor[$factor_index]) ? $factor[$factor_index] : null;
                    break;
                case 'object':
                    $this->$factor_index = isset($factor->$factor_index) ? $factor->$factor_index : null;
                    break;
                default:
                    $this->$factor_index = $factor;
            }
        }
    }

}
