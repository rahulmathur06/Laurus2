<?php

/**
 * This is a module entity. 
 * 
 * Represents the  type of enterprise from the table 'empresas_tipos'
 *
 * @author User
 */

namespace Modules\CuentasCorporativas\Entities;

use Illuminate\Database\Eloquent\Model;

class EmpresasTipo extends Model {

    /**
     * User model name
     * @var string
     */
    protected static $userModel = 'Modules\User\Entities\User';

    /**
     * Name of table with which the model is associated
     */
    protected $table = 'empresas_tipos';

    /**
     * @var array
     */
    protected $fillable = ['descripcion', 'sort_order'];
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
