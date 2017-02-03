<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 8/30/16
 * Time: 1:58 PM
 */

namespace Modules\Flota\Entities;


class Flota {

    public $CarCreate;
    public function add(CarCreate $car){
        $this->CarCreate[]=$car;
    }
} 