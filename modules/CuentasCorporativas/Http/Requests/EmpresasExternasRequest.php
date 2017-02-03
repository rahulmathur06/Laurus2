<?php

namespace Modules\CuentasCorporativas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresasExternasRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */

    public function rules() {
        return [
            'rfc' =>'required|max:14',
            'razon_social' =>'required|max:255',
            'nombre' =>'required|max:100',
            'empresas_codigo' =>'required|max:15',
            'logo' => 'required|image',
            'direccion_calle' =>'required',
            'direccion_ciudad' =>'required',
            'direccion_colonia' =>'required',
            'direccion_municipio' =>'required',
            'direccion_estado' =>'required',
            'direccion_codigo_postal' =>'required',
            'telefono1' =>'required|max:20|regex:/\([0-9]{3}\)\s{0,1}[0-9]{3}\-[0-9]{4}/',
            'telefono2' =>'max:20|regex:/\([0-9]{3}\)\s{0,1}[0-9]{3}\-[0-9]{4}/',
            'fax' =>'max:20',
            'email' =>'required|email|max:80',
            'empresaPadre' =>'int',
            'ejecutiva_id' =>'required|int',
            'comentarios' => 'string|max:65535',
            'representante' =>'required|max:100',
            'depto_contabilidad' =>'required|max:100',
            'depto_contabilidad_email' =>'required|email|max:80',
            'depto_compras' =>'required|max:100',
            'depto_compras_email' =>'required|email|max:80',
            'giro' =>'required|max:255',
            'numero_empleados' =>'required|int',
            'plazo' => 'required_if:requiere_credito,yes|int',
            'garantia' => 'required_if:requiere_credito,yes|in:voucher,pagaré,garantía moral',
            'limite' => 'required_if:requiere_credito,yes',
            'comprobante' => 'required_if:requiere_credito,yes|in:cupon,carta garantia,carta solicitud',
            'status' => 'required_if:requiere_credito,yes|in:no otorgado,suspendido,aprobado,no solicitado,solicitado'
        ];
    }

}
