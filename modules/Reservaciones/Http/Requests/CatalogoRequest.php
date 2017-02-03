<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CatalogoRequest extends FormRequest {

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
					'clave' => 'required|alpha',
					'nombre' => 'required|regex:/^[\pL\s]+$/u',
					'descripcion' => 'required'
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					//
					'clave' => 'required|alpha'
				];
			}
			default:break;
		}
	}

}