<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 8/30/16
 * Time: 1:59 PM
 */

namespace Modules\Flota\Entities;


class FleetInbound {
    public $Flota;
    public function __construct(Flota $flota){
        $this->Flota=$flota;
    }
} 