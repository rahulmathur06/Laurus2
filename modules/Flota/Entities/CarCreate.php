<?php
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 8/30/16
 * Time: 1:59 PM
 */

namespace Modules\Flota\Entities;


class CarCreate {
    public $CLAVE;
    public $DESCRIPCION;
    public $GRUPO;
    public $STATUS;
    public $CIA_SEGUROS="Qualitas";
    public $CLAVE_INT;
    public $TIPO;
    public $MODELO;
    public $MARCA;
    public $CAPACIDAD_GAS;
    public $GAS;
    public $COLOR;
    public $SERIE;
    public $PLACAS;
    public $FVENC_PLACAS="2025-01-01";
    public $FVENC_CALC="2016-03-31";
    public $FVENC_VERIF="2020-01-01";
    public $KM_SERVICIO;
    public $KM;
    public $PLAZA="SJDT01";
    public $PLAZA_CONTABLE="SJDT01";
    public $DEDUCIBLEMATERIAL;
    public $DEDUCIBLEROBO=0;
    public $IN_SERVICE;
    public $FLEET_TYPE;

    public function __construct(){
        $this->CIA_SEGUROS="Qualitas";
        $vars=get_object_vars($this);
        foreach($vars as $key=>$value){
            if($value===null){
                $this->$key="";
            }
        }

    }
} 