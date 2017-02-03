<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FlotillaRequest extends FormRequest {

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
			'nombre' => 'required|alpha_num',
			'puertas' => 'required|integer|numeric|between:1,5',
			'aire_acondicionado' => 'required|',
			'transmision' => 'required',
			'pasajeros' => 'required|integer|',
			'equipaje_chico' => 'required|integer',
			'equipaje_grande' => 'required|integer',
			'clase_id' => 'required',
			'grupo' => 'required',


			'imagen' => 'required|mimes:jpeg,bmp,png',
			'imagen_chica' => 'required|mimes:jpeg,bmp,png',
			'img_carousel' =>'required|mimes:jpeg,bmp,png'
		];
	}

}
