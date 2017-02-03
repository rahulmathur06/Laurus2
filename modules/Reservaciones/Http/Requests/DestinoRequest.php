<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DestinoRequest extends FormRequest {

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
			//
			'estado_id' => 'required|numeric',
			'nombre'	=> 'required',
			'orden'		=> 'required|integer'
		];
	}


	/**
	 * Set custom attributes for validator errors.
	 *
	 * @return array
	 */
	public function attributes(){

		return [
			'estado_id'	=> 'estado',
			'orden'		=> 'orden'
		];

	}

}
