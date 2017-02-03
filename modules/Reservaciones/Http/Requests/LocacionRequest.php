<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Reservaciones\Entities\Locacion;

class LocacionRequest extends FormRequest {

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


		$locacion = Locacion::find($this->locacion);
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
					'nombre' => 'required',
					'direccion' => 'required|max:254',
					'tel1' => 'required|max:254',
					'horario' => 'required|max:254',
					'colonia' =>'required|max:254|alpha',
					'tel2' => 'max:254',
					'horario2' =>'max:254',
					'cp' => 'required|digits:5',
					'latitud' => 'required|max:254|regex:/^[+-]?\d+\.\d+/',
					'longitud' => 'required|max:254|regex:/^[+-]?\d+\.\d+/',
					'zoom' => 'required|between:0,23|integer',
					'centro_latitud' => 'required|max:254|regex:/^[+-]?\d+\.\d+/',
					'centro_longitud' => 'required|max:254|regex:/^[+-]?\d+\.\d+/',
					'direccion_google_maps'=> 'required|url',
					'orden' => 'required|integer',
					'clave' => 'required|alpha_num|unique:mv3_locaciones_locacion,clave',
					'clave_jr' =>'required|alpha_num|unique:mv3_locaciones_locacion,clave_jr',
					'iva' => 'required|regex:/^\d?\.\d{1,2}$/',
					'imagen' => 'mimes:jpeg,bmp,png',
					'airportfee' =>  'required|regex:/^\d?\.\d{1,2}$/',
					'activo' => 'required'



				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					//
					'direccion' => 'required|max:254',
					'tel1' => 'required|max:254',
					'horario' => 'required|max:254',
					'colonia' =>'required|max:254|alpha',
					'tel2' => 'max:254',
					'horario2' =>'max:254',
					'cp' => 'required|digits:5',
					'latitud' => 'required|max:254|regex:/^[+-]?\d+\.\d+/',
					'longitud' => 'required|max:254|regex:/^[+-]?\d+\.\d+/',
					'zoom' => 'required|between:0,23|integer',
					'centro_latitud' => 'required|max:254|regex:/^[+-]?\d+\.\d+/',
					'centro_longitud' => 'required|max:254|regex:/^[+-]?\d+\.\d+/',
					'direccion_google_maps'=> 'required|url',
					'orden' => 'required|integer',
					'clave' => 'required|alpha_num|unique:mv3_locaciones_locacion,clave,'.$locacion->id,
					'clave_jr' =>'required|alpha_num|unique:mv3_locaciones_locacion,clave_jr,'.$locacion->id,
					'iva' => 'required|regex:/^\d?\.\d{1,2}$/',
					'imagen' => 'mimes:jpeg,bmp,png',
					'airportfee' =>  'required|regex:/^\d?\.\d{1,2}$/',
					'activo' => 'required'



				];
			}
			default:break;
		}

	}

}
