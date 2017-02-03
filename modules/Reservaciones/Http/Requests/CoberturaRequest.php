<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CoberturaRequest extends FormRequest {

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
					'pcode' => 'required|alpha',
					'web' => 'required',
					'pcodetarifa' => 'required',
					'catalogo_id' => 'required',
					'nombre' => 'required|regex:/^[\pL\s]+$/u',
					'descripcion' => 'required'

				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					//
					'pcode' => 'required|alpha',
					'web' => 'required',
					'pcodetarifa' => 'required',
					'catalogo_id' => 'required',

				];
			}
			default:break;
		}
	}

}
