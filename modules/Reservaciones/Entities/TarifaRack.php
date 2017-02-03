<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class TarifaRack extends Model {

    protected $fillable = ['tarifa_id', 'tarifabase'];
    
    protected  $table ='mv3_tarifa_rack';
    
    public $timestamps = false;
    
    public function tarifa(){
        $this->belongsTo('Illuminate\Database\Eloquent\Model\TarifaListado');
    }

}