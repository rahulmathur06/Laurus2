<?php namespace Modules\Reservaciones\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CierresRequest extends FormRequest {

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
                'motivo'=>'required|max:250',
                'locacion_id'=>'required|numeric',
                'auto_id'=>'required|numeric',
                'fecha_ini'=>'required|date_format:Y-m-d',
                'fecha_fin'=>'required|date_format:Y-m-d'
            ];
	}
        
        public function attributes(){

            return [
                'motivo'=>'Motivo',
                'locacion_id'=>'Locación',
                'auto_id'=>'AUTOS',
                'fecha_ini'=>'Fecha Inicio',
                'fecha_fin'=>'Fecha Fin'       
            ];

	}

}
