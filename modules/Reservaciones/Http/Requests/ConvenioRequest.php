<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConvenioRequest extends FormRequest {

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
			'nombre'      	=> 'required',
			'descripcion'	=> 'required',
			'acronimo'		=> 'required|max:3|alpha',
			'idioma'		=> 'required',
			'moneda'		=> 'required',
			'horas_tolerancia' => ' required|integer|',
			'dias_semana' => 'required|integer|between:1,7',
			'dias_mes' => 'required|integer|between:1,31'
		];
	}
	/**
	 * Set custom attributes for validator errors.
	 *
	 * @return array
	 */
	public function attributes(){

		return [
			'horas_tolerancia' => 'horas de tolerancia',
			'dias_semana' => 'Días de la semana',
			'dias_mes' => 'Días del mes'
		];

	}

}
