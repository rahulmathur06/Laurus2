<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TraduccionDestinoRequest extends FormRequest {

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
			'mensaje' => 'required',
			'idioma'  => 'required'
		];
	}

}
