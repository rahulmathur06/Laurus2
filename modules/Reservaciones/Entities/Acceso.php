<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Acceso extends Model {

    /**
     * Model name convenio
     * @var string
     */
    protected static $convenioModel = 'Modules\Reservaciones\Entities\Convenio';
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_accesos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['id_convenio','usuario','password','ip','activo'];

    /**
     *  1:N
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function convenio(){
        return $this->belongsTo(static::$convenioModel,'id_convenio');
    }

    /**
     * encript password acceso
     * @param $value = password
     */
    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @param $value activo
     * @return string
     */
    public function getActivoAttribute($value){
        return ($value ? 'Si' : 'No');
    }
}