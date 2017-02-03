<?php

namespace Modules\CuentasCorporativas\Entities;

use Illuminate\Database\Eloquent\Model;

class EmpresasTask extends Model {

    const STATUS_COMPLETED = 2;
    const STATUS_CANCELLED = 1;
    const STATUS_PENDING = 0;

    protected $fillable = ['task_id', 'empresa_id', 'type'];

    /**
     * Name of table with which the model is associated
     */
    protected $table = 'empresa_tasks';

    /**
     * Disabling the timestamps
     * @var type 
     */
    public $timestamps = false;

}
