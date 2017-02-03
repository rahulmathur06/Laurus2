<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Modules\Reservaciones\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Description of Extra
 *
 * @author User
 */
class Extra extends Model {
    
    protected $fillable = ['costo_mxn', 'costo_usd', 'incrementable', 'descripcion_esMX', 'descripcion_enUS', 'activo'];
    
    protected $table = 'mv3_extras';
    
    public $timestamps = false;
    
}
