<?php namespace Modules\Flota\Entities;
/**
 * Created by PhpStorm.
 * User: programador
 * Date: 8/25/16
 * Time: 7:26 PM
 */

use Illuminate\Database\Eloquent\Model;
use Modules\User\Entities\User;

class Unidad extends Model{


    protected $table = "flotilla_inventario";
    protected $primaryKey = 'clave';
    public $timestamps = false;

    protected $fillable = [
        'clave',
		'descripcion',
        'grupo',
		'status',
		'plaza_contable',
		'plaza',
		'tipo',
		'clave_int',
		'ano',
		'marca',
		'color',
		'no_puertas',
		'transmision',
		'pasajeros',
		'capacidad_gas',
		'cia_seguros',
        'serie',
        'motor',
		'placas',
		'km_servicio',
		'fecha_compra',
		'costo_iva',
		'no_factura',
		'proveedor',
		'fleet_type',
		'nota_fleet_type',
		'tenencia_ano',
		'tenencia_importe',
        'modelo',
        'activo',
		'fvenc_placas',
		'fvenc_verif',
		'km',
		'gas',
		'in_service',
		'deduciblematerial',
		'deduciblerobo',
		'fecha_um',
		'fecha_envio'	
    ];





} 