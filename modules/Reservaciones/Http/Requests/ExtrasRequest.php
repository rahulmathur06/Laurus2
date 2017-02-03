<?php


namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Description of DropOffCostosRequest
 *
 * @author User
 */
class ExtrasRequest extends FormRequest {
    
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
            'descripcion_esMX' => 'required|max:80',
            'descripcion_enUS' => 'required|max:80',
            'costo_mxn' => 'required|numeric|min:1',
            'costo_usd' => 'required|numeric|min:1'            
        ];
    }
    
    public function attributes() {
        return [
            'descripcion_esMX' => 'Descripcion es-MX',
            'descripcion_enUS' => 'Descripcion en-US',
            'costo_mxn' => 'Cost MN',
            'costo_usd' => 'Cost USD'  
        ];
    }
    
}
