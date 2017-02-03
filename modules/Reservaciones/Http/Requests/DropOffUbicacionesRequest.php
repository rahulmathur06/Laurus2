<?php


namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Description of DropOffCostosRequest
 *
 * @author User
 */
class DropOffUbicacionesRequest extends FormRequest {
    
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
            'ciudad_dropoff_id' => 'required|int|different:ciudad_pickup_id',
            'ciudad_pickup_id' => 'required|int',
            'distancia_calc' => 'numeric',
            'distancia' => 'numeric|required_without:distancia_calc'
        ];
    }
    
    public function attributes() {
        return [
            'ciudad_dropoff_id' => 'LOCACIÓN PICK UP',
            'ciudad_pickup_id' => 'LOCACIÓN DROP OFF',
            'distancia_calc' => 'DISTANCIA CALCULADA',
            'distancia' => 'DISTANCIA A UTILIZAR'
        ];
    }
    
}
