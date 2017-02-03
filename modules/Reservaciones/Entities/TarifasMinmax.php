<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class TarifasMinmax extends Model {
    /**
     * @var string
     */
    /**
     * The database table used by the model.
     *
     * @var string
     */
    public $timestamps = false;


    protected $table = 'mv3_tarifas_minmax';
    /**
     * @var array
     */
    protected $fillable = ['locacion_id','autos_clases_id','min_precio','max_precio'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function clases(){
        return $this->belongsTo('Modules\Reservaciones\Entities\AutoClases','autos_clases_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function locacion(){
        return $this->belongsTo('Modules\Reservaciones\Entities\Locacion','locacion_id');
    }

    public function searchLocaciones(){
        $restricciones = $this->all(['locacion_id']);
        $locaciones = LocacionTraducciones::select()->whereNotIn('locacion_id',$restricciones->toArray())
            ->lists('nombre','locacion_id');

        if(count($locaciones) > 0){
            return $locaciones;
        }
        throw new Exception('Todas las oficinas ya tienen restricciones o no hay oficinas registradas.');
    }
}