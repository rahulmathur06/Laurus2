<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AnticipacionRequest extends FormRequest {

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
		switch($this->method())
		{
			case 'GET':
			case 'DELETE':
			{
				return [];
			}
			case 'POST':
			{
				return [
					//
					'locacion_id' => 'required|integer',
					'clase_id' => 'required|integer',
					'min_tiempo' => 'required|numeric|integer'
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					//
					'min_tiempo' => 'required|numeric|integer'
				];
			}
			default:break;
		}


	}

	/**
	 * Set custom attributes for validator errors.
	 *
	 * @return array
	 */
	public function attributes(){

		return [
			'locacion_id' => 'locación',
			'clase_id' => 'clase',
			'min_tiempo' => 'tiempo minimo'
		];

	}

}
