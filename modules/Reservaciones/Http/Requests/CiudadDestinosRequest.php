<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CiudadDestinosRequest extends FormRequest {

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
			'destino_id' => 'required',
		];
	}

	public function attributes(){

		return [
			'destino_id' => 'Destino',
		];

	}

}
