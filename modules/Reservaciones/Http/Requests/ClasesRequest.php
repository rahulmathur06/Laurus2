<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Reservaciones\Entities\AutoClases;

class ClasesRequest extends FormRequest {

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
		$clases = AutoClases::find($this->clases);
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
					'nombre' => 'required|',
					'descripcion' => 'required',
					'categoria_id' => 'required',
					'clase' => 'required|max:2|alpha_num',
					'sipp' => 'required|max:4|min:4|alpha|unique:mv3_autos_clases,sipp',
					'prioridad'=> 'required|numeric',
					'grupo' => 'required'
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					//
					'categoria_id' => 'required',
					'clase' => 'required|max:2|alpha_num',
					'sipp' => 'required|max:4|min:4|alpha|unique:mv3_autos_clases,sipp,'.$clases->id,
					'prioridad'=> 'required|numeric',
					'grupo' => 'required'
				];
			}
			default:break;
		}
	}

	
}
