<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImpuestosRequest extends FormRequest {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
            return [
            'tax_factor'=>'required|numeric|max:100',
            'airport_fee'=>'required|numeric|max:100'
            ];
	}
        
        public function attributes(){

            return [
            'tax_factor'=>'AIRPORT FEE',
            'airport_fee'=>'IVA'       
            ];

	}

}
