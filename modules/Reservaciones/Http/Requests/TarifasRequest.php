<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TarifasRequest extends FormRequest {

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
			'nombre'=>'required|string|max:100',
                        'descripcion'=>'required|string',
                        'tipo'=>'required|numeric|in:1,2,3,4',
                        'f_ini'=>'required|date_format:Y-m-d',
                        'f_fin'=>'required|date_format:Y-m-d|after:f_ini',
                        'moneda'=>'required',
                        'precio' => 'array|PriceValidater:'.$this->tipo,
                        'temp' => 'array|TempValidater',
                        'personas' => 'array|required_if:tipo,2',
                        'factor_promo' => 'numeric|max:100|required_if:tipo,4',
                        'fecha_inicio' => 'date_format:Y-m-d|required_if:tipo,4',
                        'fecha_fin' => 'date_format:Y-m-d|after:fecha_inicio|required_if:tipo,4',
                        'precio_rack_id' => 'numeric|required_if:tipo,4'
                        ];
	}

	/**
	 * Set custom attributes for validator errors.
	 *
	 * @return array
	 */
	public function attributes(){

		return [
			'nombre'=>'Nombre',
                        'descripcion'=>'Descripcion',
                        'tipo'=>'Tipo',
                        'f_ini'=>'Fecha Inicio',
                        'f_fin'=>'Fecha Fin',
                        'moneda'=>'Moneda',
                        'precio' => 'Prices for all clases',
                        'factor_promo' => 'Factor De Promocion',
                        'fecha_inicio' => 'Fecha Inicio',
                        'fecha_fin' => 'Fecha Fin',
                        'precio_rack_id' => 'Precio rack',
                        'personas' => 'Tipo de persona'
		];

	}

}
