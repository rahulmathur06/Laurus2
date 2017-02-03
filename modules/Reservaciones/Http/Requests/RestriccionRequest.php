<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestriccionRequest extends FormRequest {

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
			'openMonday' => 'required',
			'closeMonday' => 'required',
			'openTuesday' => 'required',
			'closeTuesday' => 'required',
			'openWednesday' => 'required',
			'closeWednesday' => 'required',
			'openThursday' => 'required',
			'closeThursday' => 'required',
			'openFriday' => 'required',
			'closeFriday' => 'required',
			'openSaturday' => 'required',
			'closeSaturday' => 'required',
			'openSunday' => 'required',
			'closeSunday' => 'required'
		];
	}

	/**
	 * Set custom attributes for validator errors.
	 *
	 * @return array
	 */
	public function attributes(){

		return [
			'openMonday' => 'Lunes abierto',
			'closeMonday' => 'Lunes cerrado',
			'openTuesday' => 'Martes abierto',
			'closeTuesday' => 'Martes cerrado',
			'openWednesday' => 'Miercoles abierto',
			'closeWednesday' => 'Miercoles cerrado',
			'openThursday' => 'Jueves abierto',
			'closeThursday' => 'Jueves cerrado',
			'openFriday' => 'Viernes abierto',
			'closeFriday' => 'Viernes cerrado',
			'openSaturday' => 'Sabado abierto',
			'closeSaturday' => 'Sabado cerrado',
			'openSunday' => 'Domingo abierto',
			'closeSunday' => 'Domingo cerrado'
		];

	}

}
