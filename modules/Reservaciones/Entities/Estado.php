<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Estado extends Model {

    protected $table = 'mv3_locaciones_estados';

    public function destinos(){
        return $this->hasMany('Module\Reservaciones\Entities\Destino');
    }
}