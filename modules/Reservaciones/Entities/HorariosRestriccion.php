<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;
use PhpSpec\Exception\Exception;

class HorariosRestriccion extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_horarios_restricciones';

    protected $fillable = [
        'locacion_id','openMonday','closeMonday',
        'openTuesday','closeTuesday','openWednesday','closeWednesday',
        'openThursday','closeThursday','openFriday','closeFriday',
        'openSaturday', 'closeSaturday','openSunday','closeSunday'
    ];


    public function locacion(){
        return $this->belongsTo('Modules\Reservaciones\Entities\Locacion','locacion_id');
    }

    public function getLunesAttribute(){
        return $this->attributes['openMonday']. "-". $this->attributes['closeMonday'];
    }
    public function getMartesAttribute(){
        return $this->attributes['openTuesday']. "-". $this->attributes['closeTuesday'];
    }
    public function getMiercolesAttribute(){
        return $this->attributes['openWednesday']. "-". $this->attributes['closeWednesday'];
    }
    public function getJuevesAttribute(){
        return $this->attributes['openThursday']. "-". $this->attributes['closeThursday'];
    }
    public function getViernesAttribute(){
        return $this->attributes['openFriday']. "-". $this->attributes['closeFriday'];
    }
    public function getSabadoAttribute(){
        return $this->attributes['openSaturday']. "-". $this->attributes['closeSaturday'];
    }
    public function getDomingoAttribute(){
        return $this->attributes['openSunday']. "-". $this->attributes['closeSunday'];
    }


    public function searchLocaciones(){
        $restricciones = $this->all(['locacion_id']);
        $locaciones = LocacionTraducciones::select()->whereNotIn('locacion_id',$restricciones->toArray())
            ->where('idioma','es-MX')
            ->lists('nombre','locacion_id');

        if(count($locaciones) > 0){
            return $locaciones;
        }
        throw new Exception('Todas las oficinas ya tienen restricciones o no hay oficinas registradas.');
    }
}


