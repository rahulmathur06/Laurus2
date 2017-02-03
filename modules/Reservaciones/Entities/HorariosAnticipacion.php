<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class HorariosAnticipacion extends Model {
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_horarios_anticipacion';

    protected $fillable = ['locacion_id','clase_id','min_tiempo'];




    public function locacion(){
        return $this->belongsTo('Modules\Reservaciones\Entities\Locacion','locacion_id');
    }
    public function clase(){
        return $this->belongsTo('Modules\Reservaciones\Entities\AutoClases','clase_id');
    }
}