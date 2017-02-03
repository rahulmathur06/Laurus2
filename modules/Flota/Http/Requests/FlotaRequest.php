<?php namespace Modules\Flota\Http\Requests;

use App\Http\Requests\Request;

class FlotaRequest extends Request
{
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
            'clave' => 'required|unique:flotilla_inventario,clave',
            'grupo' => 'required',
            'cia_seguros' => 'required',
            'clave_int' => 'required',
            'tipo' => 'required',
            'modelo' => 'required',
            'marca' => 'required',
            'color' => 'required',
            'serie' => 'required',
            'placas' => 'required',
            'plaza_contable' => 'required',
			'capacidad_gas' => 'required',
			'gas' => 'required',
			'motor' => 'required',
			'km_servicio' => 'required',
			'km' => 'required',
			'plaza' => 'required',
			'fleet_type' => 'required',
			'deduciblematerial' => 'required',
			'deduciblerobo' => 'required',
			
			

		];
    }
    
    public function messages(){
    	return [
    			'clave.required' => 'La clave es requerida',
    			'grupo.required' => 'El grupo es requerido',
    			'cia_seguros.required' => 'La compania seguros es requerida',
    			'clave_int.required' => 'La clave interior es requerida',
    			'tipo.required' => 'El tipo es requerido',
    			'modelo.required' => 'El modelo es requerido',
    			'marca.required' => 'La marca es requerida',
    			'color.required' => 'El color es requerido',
                'serie.required' => 'La serie es requerida',
                'placas.required' => 'Las placas son requeridas',
                'plaza_contable.required' => 'La plaza contable es requerida',
					'capacidad_gas.required' => 'La capacidad de gas es requerida',
					'gas.required' => 'La gas es requerida',
					'motor.required' => 'El motor es requerido',
					'km_servicio.required' => 'El km servicio es requerido',
					'km.required' => 'El km es requerido',
					'plaza.required' => 'La plaza es requerida',
					'fleet_type.required' => 'El fleet type es requerido',
					'deduciblematerial.required' => 'El deducible de material es requerido',
					'deduciblerobo.required' => 'El deducible de robo es requerido',
    	];
    }
    

}
