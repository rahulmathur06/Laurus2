<?php

namespace Modules\Flota\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FueraServicioRequest extends FormRequest {

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
            'clave' => 'required|max:15',
            'sucursal' => 'required|max:3',
            'numSiniestro' => 'required|max:50',
            'numReporte' => 'required|max:50',
            'inciso' => 'required|max:20',
            'poliza' => 'required|max:20',
            'fecha_del_siniestro' => 'required|date_format:Y-m-d|before:tomorrow',
            'tipo_siniestro' => 'required|max:100',
            'comentarios' => 'required|max:255',
        ];
    }

}
