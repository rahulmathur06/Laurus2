<?php namespace Modules\Flota\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerdidaTotalEditRequest extends FormRequest {

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
			'clave' => 'required|alpha_num',
			'description' => 'required',
			'tipo_siniestro' => 'required|alpha_num',
			'cliente' => 'required|',
			'comentarios' => 'required',
			'fecha_del_siniestro' => 'required',
			'tipo_siniestro' => 'required|max:100',
			'deducible' => 'required|integer|between:1,100',
			'recuperacion' => 'required|integer|between:1,100',
			'numReporte' => 'required',
			'cobertura' => 'required',
			'ciudad' => 'required',

			'num_contrato' => 'required',
			'contrato_inicio' => 'required',
			'contrato_fin' => 'required',
			'cliente' => 'required',

			
		];
	}

}
