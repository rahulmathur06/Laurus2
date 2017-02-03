<?php

namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromoRequest extends FormRequest {

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
            'promocode' => 'required|string|max:20',
            'descripcion' => 'required|string|max:255',
            'tipo_promo' => 'required|in:1,2,3,4',
            'fechaini' => 'required|date_format:Y-m-d',
            'fechafin' => 'required|date_format:Y-m-d|after:fechaini',
            'factor_mxm' => 'required_if:tipo_promo,1|regex:/(?:\d)+?x(?:\d)+/',
            'factor_dpor' => 'required_if:tipo_promo,2|numeric|max:100',
            'factor_ddia' => 'required_if:tipo_promo,3|integer',
            'factor_dcant' => 'required_if:tipo_promo,4|numeric',
        ];
    }

    /**
     * Set custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes() {
        return [
            'promocode' => 'CODIGO PROMOCION',
            'descripcion' => 'DESCRIPCIÓN',
            'tipo_promo' => 'TIPO DE PROMOCION',
            'fechaini' => 'F. INICIO',
            'fechafin' => 'F. FIN',
            'factor_mxm' => 'Dias Renta x Dias Gratis',
            'factor_dpor' => 'Porcentaje a descontar',
            'factor_ddia' => 'Dias Gratis',
            'factor_dcant' => 'Importe a Descontar'
        ];
    }

}
