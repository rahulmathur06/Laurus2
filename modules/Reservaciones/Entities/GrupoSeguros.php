<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class GrupoSeguros extends Model {

    protected $table = 'mv3_seguros_grupos';

    protected $fillable = ['nombre','descripcion'];

}