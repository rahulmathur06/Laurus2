<?php

namespace Modules\CuentasCorporativas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TipoEmpresasRequest extends FormRequest {

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
            'sort_order' => 'numeric|min:1',
            'descripcion' => 'required|max:100'
        ];
    }

}
