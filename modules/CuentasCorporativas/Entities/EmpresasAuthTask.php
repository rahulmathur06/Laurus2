<?php

namespace Modules\CuentasCorporativas\Entities;

use Illuminate\Database\Eloquent\Model;

class EmpresasAuthTask extends Model {

    protected $fillable = ['task_id', 'empresa_id'];

    /**
     * Name of table with which the model is associated
     */
    protected $table = 'empresa_auth_tasks';

    /**
     * Disabling the timestamps
     * @var type 
     */
    public $timestamps = false;

}
