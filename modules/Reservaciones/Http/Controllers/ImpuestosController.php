<?php namespace Modules\Reservaciones\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Reservaciones\Entities\Impuestos;
use Modules\Reservaciones\Http\Requests\ImpuestosRequest;

class ImpuestosController extends Controller {
    protected $Impuestos;

    public function __construct(Impuestos $Impuestos) {
        $this->Impuestos = $Impuestos;
    }
    
    public function index()
    {
        $impuestos = $this->Impuestos->all();
        return view('reservaciones::impuestos.index',compact('impuestos'));
    }
    
    public function create() {
        return view('reservaciones::impuestos.create');
    }
    
    public function store(ImpuestosRequest $request) {
        //fill valuses in model
        $this->Impuestos->fill($request->only('tax_factor','airport_fee'));
        //save model
        $this->Impuestos->save();
        flash()->success('Creación exitosa.');
        //redirect to index
        return redirect('impuestos');
    }
    
    public function destroy($id) {
        try {
            $impuestos = $this->Impuestos->find($id);
            $impuestos->delete();
            return response()->json(['msg' => 'el registro se elimino exitosamente'], 200);
        } catch (QueryException $e) {
            return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
        }
    }
    
    public function edit($id) {
        $impuestos = $this->Impuestos->find($id);
        return view('reservaciones::impuestos.edit', compact('impuestos'));
    }
    
    public function update(ImpuestosRequest $request, $id) {
        $impuestos = $this->Impuestos->findOrFail($id);
        //fill valuses in model
        $impuestos->fill($request->only('tax_factor','airport_fee'));
        //save model
        $impuestos->save();
        // message
        flash()->success('Actualización exitosa.');

        return redirect('impuestos');
    }
	
}