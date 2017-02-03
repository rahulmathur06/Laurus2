<?php

/**
 * This is a module entity. 
 * 
 * Represents the  type of enterprise from the table 'Empresas'
 *
 * @author User
 */

namespace Modules\CuentasCorporativas\Entities;

use Illuminate\Database\Eloquent\Model;

class EmpresasCredito extends Model {

    /**
     * User model name
     * @var string
     */
    protected static $userModel = 'Modules\User\Entities\User';
    
    /**
     * Empresa model name
     * @var string
     */
    protected static $empresaModel = 'Modules\CuentasCorporativas\Entities\Empresas';

    /**
     * Name of table with which the model is associated
     */
    protected $table = 'empresas_credito';

    /**
     * @var array
     */
    protected $fillable = ['plazo', 'garantia', 'limite', 'comprobante', 'status', 'empresa'];

    public $timestamps = false;
    
    /**
     * The User Relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsToMany(static::$userModel);
    }

}
