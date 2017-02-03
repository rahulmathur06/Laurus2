<?php namespace Modules\Reservaciones\Entities;
   
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model {
    /**
     * @var array tipo de promocion
     */
    protected $tipo_promocion = [
        'playa'  => 'PLAYA',
        'ciudad' => 'CIUDAD'
    ];
    /**
     * @var array moneda
     */
    protected $moneda = [
        'MXN' => 'MXN',
        'USD' => 'USD'
    ];

    protected $value = [
        '0' => "NO",
        '1' => "SI"
    ];

    protected $idioma = [
        'es-MX' => 'Español',
        'en-US' => 'Ingles'
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mv3_promociones';
    /**
     * @var array
     */
    protected $fillable = [
        'plancode_id',
        'cobertura_id',
        'pages_id',
        'destino_mes',
        'fechaini',
        'fechafin',
        'descripcion',
        'clave',
        'acumular_prepago',
        'acumular_prepago_valor',
        'tarifa_desglozada',
        'mostrar_descuento',
        'moneda',
        'tipo_promocion',
        'terminos_condiciones',
        'visible',
        'activo'
    ];

    // getters
    /**
     * @return array
     */

    public function getValue(){
        return $this->value;
    }

    /**
     * @return array
     */
    public function getMoneda(){
        return $this->moneda;
    }

    public function getIdioma(){
        return $this->idioma;
    }

    /**
     * @return array
     */
    public function getTipoPromocion(){
        return $this->tipo_promocion;
    }

    public function getActivoAttribute($value){
        return ($value ? 'Si' : 'NO');
    }
    public function getVisibleAttribute($value){
        return ($value ? 'Si' : 'NO');
    }

    public function getTipoPromocionAttribute($value){
        return strtoupper($value);
    }


    // setters


    // relationship
    public function translation($language = null){
        return $this->hasMany('Modules\Reservaciones\Entities\PromocionTraducciones','promocion_id')->where('idioma', '=', $language);
    }

    public function translations(){
        return $this->hasMany('Modules\Reservaciones\Entities\PromocionTraducciones','promocion_id');
    }

}