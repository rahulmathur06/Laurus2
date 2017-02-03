<?php namespace Modules\Flota\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Modules\Roles\Entities\Rol;

class FlotillaSiniestros extends Model {
    /**
     * User model name
     * @var string
     */
    protected static $userModel = 'Modules\User\Entities\User';
    /**
     * Name of table with which the model is associated
     */
    protected $table = 'flotilla_siniestros';
    
    /**
     * @var string
     * This is to define the name of th primary key in the table
     */
    protected $primaryKey = 'siniestro_id';
    /**
     * @var array
     */
    protected $fillable = ['siniestro_id','clave','sucursal','numSiniestro','numReporte','inciso','poliza','tipo_siniestro','fecha_del_siniestro','comentarios','num_dias','description'];

    /**
     * The User Relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany(static::$userModel);
    }
    
    public function flotilla_inventrio(){
        return $this->belongsTo('\Modules\Flota\Entities\Unidad');
    }


}