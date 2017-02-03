<?php namespace Modules\Cuentascorporativas\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConveniosRequest extends FormRequest {

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
                    'empresa_id'=>'required|int',
                    'convenio_descripcion'=>'required|max:40',
                    'duracion'=>'required|int',
                    'tarifa_id'=>'required|int',
                    'seguro_id'=>'required|int',
                    'empresa_id'=>'required|int',
                    'checklist'=>'array|checkRequired'
		];
	}

}
