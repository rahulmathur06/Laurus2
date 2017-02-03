<?php

/**
 * This is a module entity. 
 * 
 * Represents the  type of enterprise from the table 'personas_tipos'
 *
 * @author User
 */

namespace Modules\CuentasCorporativas\Entities;

use Illuminate\Database\Eloquent\Model;

class PersonasTipo extends Model {

    /**
     * User model name
     * @var string
     */
    protected static $userModel = 'Modules\User\Entities\User';

    /**
     * Name of table with which the model is associated
     */
    protected $table = 'personas_tipos';

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
