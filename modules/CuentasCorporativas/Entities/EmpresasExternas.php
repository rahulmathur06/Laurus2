<?php

/**
 * This is a module entity. 
 * 
 * Represents the  type of enterprise from the table 'Empresas'
 *
 * @author User
 */

namespace Modules\CuentasCorporativas\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\CuentasCorporativas\Entities\EmpresasExternasCredito;

class EmpresasExternas extends Model {

    //Update the defualt names for the timestamp fields
    const CREATED_AT = 'fecha_alta';
    const UPDATED_AT = 'fecha_modificacion';

    /**
     * User model name
     * @var string
     */
    protected static $userModel = 'Modules\User\Entities\User';
    
    /**
     * EmpresaCredito model name
     * @var string
     */
    protected static $creditModel = 'Modules\CuentasCorporativas\Entities\EmpresasExternasCredito';

    /**
     * Name of table with which the model is associated
     */
    protected $table = 'empresas_externas';

    /**
     * @var array
     */
    protected $fillable = ['rfc', 'cliente_fiscal','razon_social','nombre','empresas_codigo','logo','direccion_calle','direccion_ciudad','direccion_colonia','direccion_municipio','direccion_estado','direccion_codigo_postal','telefono1','telefono2','fax','email','empresaPadre','ejecutiva_id','representante','comentarios','depto_contabilidad','depto_contabilidad_email','depto_compras','depto_compras_email','giro','numero_empleados','status','usuario_aprobacion'];


    /**
     * The User Relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() {
        return $this->belongsTo(static::$userModel,'ejecutiva_id');
    }
    
    public function credit() {
        return $this->hasOne(static::$creditModel, 'empresa');
    }

}
