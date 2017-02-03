<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarifasMinmaxRequest extends FormRequest {

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
			'locacion_id' => 'required|integer',
			'autos_clases_id' => 'ArrayValidater',
			'min_precio' => 'ArrayValidater',
			'max_precio' => 'ArrayValidater|maxValidator'
		];
	}

}
