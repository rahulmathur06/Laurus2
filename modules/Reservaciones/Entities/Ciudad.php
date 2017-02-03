<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model {
    protected static $modelEstado = 'Modules\Reservaciones\Entities\Estado';
    protected $table = 'mv3_locaciones_ciudad';
    protected $fillable = ['estado_id','nombre','acron','aip'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function estado(){
        return $this->belongsTo(static::$modelEstado, 'estado_id');
    }

    public function destinos(){
        return $this->belongsToMany('Modules\Reservaciones\Entities\Destino','mv3_locaciones_ciudad_destino','ciudad_id','destino_id');
    }
    /**
     * @param $value
     */
    public function setAipAttribute($value){
        $this->attributes['aip'] = strtoupper($value);
    }
    /**
     * @param $value
     */
    public function setAcronAttribute($value){
        $this->attributes['acron'] = strtoupper($value);
    }

    /**
     * @param $value
     */
    public function setNombreAttribute($value){
        $this->attributes['nombre'] = ucfirst($value);
    }


    public function addDestino($id){
        $this->destinos()->sync($id);
    }

}