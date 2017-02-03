<?php

namespace Modules\CuentasCorporativas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoPersonasRequest extends FormRequest {

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
            'descripcion' => 'required|max:100',
            'sort_order' => 'numeric|min:1'
        ];
    }

}
