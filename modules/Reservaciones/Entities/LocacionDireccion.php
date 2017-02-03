<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class LocacionDireccion extends Model {
    protected $table = 'mv3_direccion_locacion';

    protected $fillable = [
        'id_locacion',
        'direccion',
        'colonia',
        'cp',
        'tel1',
        'tel2',
        'horario',
        'horario2'
    ];




}