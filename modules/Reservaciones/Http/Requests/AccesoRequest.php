<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Reservaciones\Entities\Acceso;

class AccesoRequest extends FormRequest {

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
		$acceso = Acceso::find($this->acceso);
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
					'id_convenio'      	=> 'required',
					'usuario'		=> 'required|alpha_num|unique:mv3_accesos,usuario',
					'password'		=> 'required|alpha_num|min:6',
					'ip'		    => 'required|ip',
					'activo'		=> 'required'
				];
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					//

					'id_convenio'   => 'required',
					'usuario'		=> 'required|unique:mv3_accesos,usuario,'.$acceso->id,
					'password'		=> 'min:6|alpha_num',
					'ip'		    => 'required|ip',
					'activo'		=> 'required'



				];
			}
			default:break;
		}



	}

}
