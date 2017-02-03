<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class CoberturaTraducciones extends Model {
    protected $idioma = [
        'es-MX' => 'Español',
        'en-US' => 'Ingles'
    ];
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_traducciones_coberturas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cobertura_id','idioma','nombre','descripcion'];

    public function cobertura(){
        return $this->belongsTo('Modules\Reservaciones\Entities\Cobertura');
    }
    /**
     * @return array
     */
    public function getIdioma(){
        return $this->idioma;
    }


}