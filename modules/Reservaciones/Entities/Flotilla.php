<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Flotilla extends Model
{
    protected $transmision = [
        'STD' => 'STANDAR',
        'AUT' => 'AUTOMATICA'
    ];
    protected $group = [
        'ANTYR' => 'ANTYR',
        'BEPENSA' => 'BEPENSA'
    ];

    protected $aire = [
        '0' => 'No',
        '1' => 'Si'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_autos_flotilla';
    protected $fillable = [
        'clase_id',
        'nombre',
        'grupo',
        'puertas',
        'transmision',
        'aire_acondicionado',
        'pasajeros',
        'equipaje_grande',
        'equipaje_chico',
        'imagen_chica',
        'imagen',
        'img_carousel'
    ];

    public function getTransmision()
    {
        return $this->transmision;
    }
    public function getAire(){
        return $this->aire;
    }

    public function getGrupos(){
        return $this->group;
    }

    public function setNombreAttribute($value){
        $this->attributes['nombre'] = ucfirst($value);
    }

    public function clase()
    {
        return $this->belongsTo('Modules\Reservaciones\Entities\AutoClases', 'clase_id');
    }


}