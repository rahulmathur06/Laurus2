<?php


namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Description of DropOffCostosRequest
 *
 * @author User
 */
class DropOffCostosRequest extends FormRequest {
    
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
            'fecha_ini' => 'required|date_format:Y-m-d',
            'fecha_fin' => 'required|date_format:Y-m-d|after:fecha_ini|RangeValidiation',
            'valor_mxn' => 'required',
            'valor_usd' => 'required'
        ];
    }
    
}
