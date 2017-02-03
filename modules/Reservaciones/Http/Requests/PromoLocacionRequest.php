<?php

namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PromoLocacionRequest extends FormRequest {

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
            'locacion_id' => 'required|integer',
            'promo_id' => 'required|integer',
            'clases' => 'array|required'
        ];
    }

    /**
     * Set custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes() {

        return [
            'locacion_id' => 'LOCACIÓN',
            'promo_id' => 'PROMOCIÓN',
            'clases' => 'Selection of at least one clase'
        ];
    }
    
    public function messages() {
        return [
            'required' => ':attribute es obligatorio'
        ];
    }

}
