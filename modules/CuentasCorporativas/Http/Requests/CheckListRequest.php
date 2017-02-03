<?php namespace Modules\CuentasCorporativas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckListRequest extends FormRequest {

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
			'documento' => 'required',
			'tipo_persona_id' => 'integer',
			'tipo_convenio_id' => 'required|integer',
			'orden' => 'integer|required',
			'requerido' => 'integer',
			'validar_fecha' => 'integer',

		];
	}

}
