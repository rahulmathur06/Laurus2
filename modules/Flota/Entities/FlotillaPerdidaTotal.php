<?php namespace Modules\Flota\Entities;
   
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Modules\Roles\Entities\Rol;

class FlotillaPerdidaTotal extends Model {
    /**
     * User model name
     * @var string
     */
    protected static $userModel = 'Modules\User\Entities\User';
    /**
     * @var string
     */
    protected $table = 'flotilla_perdida_total';
    /**
     * @var array
     */
    protected $fillable = ['id','clave','numSiniestro','numReporte','inciso','poliza','tipo_siniestro','fecha_del_siniestro','ciudad','sucursal','cobertura','cobertura','deducible','recuperacion','num_contrato','contrato_inicio','contrato_fin','cliente','comentarios','description'];

    /**
     * The User Relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany(static::$userModel);
    }


}