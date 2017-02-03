<?php namespace Modules\Cuentascorporativas\Http\Controllers;

use Pingpong\Modules\Routing\Controller;
use Modules\Reservaciones\Entities\Convenio;
use Modules\Reservaciones\Entities\TarifaListado;
use Modules\CuentasCorporativas\Entities\Checklist;
use Modules\CuentasCorporativas\Entities\Empresas;
use Modules\CuentasCorporativas\Http\Requests\ConveniosRequest;
use Modules\CuentasCorporativas\Entities\Convenios;
use Modules\Reservaciones\Entities\Catalogo;
use Illuminate\Support\Facades\DB;
use Input;
use Illuminate\Support\Facades\Request;
use Modules\CuentasCorporativas\Entities\ConvenioChklist;

class ConveniosController extends Controller {
	
    protected $Convenios;

    public function __construct(Convenios $Convenios) {
        $this->Convenios = $Convenios;
    }
    
    public function index()
    {
        $convenios = $this->Convenios->join('empresas', 'empresas.id', '=', 'convenios_convenio.empresa_id')
                ->join('mv3_tarifas_listado', 'mv3_tarifas_listado.id', '=', 'convenios_convenio.tarifa_id')
                ->join('convenio_tipo', 'convenio_tipo.id', '=', 'convenios_convenio.tipo_convenio')
                ->select('convenios_convenio.*','empresas.nombre','mv3_tarifas_listado.nombre as tarifas_nombre','convenio_tipo.descripcion')->get();
        
        return view('cuentascorporativas::convenio.index',compact('convenios'));
    }
    
    public function create() {
        $tarifa = TarifaListado::lists('nombre','id');
        $catalogo = Catalogo::lists('clave','id');
        $convenio_tipo = DB::table('convenio_tipo')->orderBy('sort_order', 'asc')->lists('descripcion', 'id');
        $empresas = Empresas::lists('nombre','id');
        $convenio_chklist = array();
        return view('cuentascorporativas::convenio.create',compact('tarifa','catalogo','empresas','convenio_tipo','convenio_chklist'));
    }
    
    public function getDetail() {
        try {
            $empresa_id = Request::input('empresa_id');
            $tipo_persona_id = Empresas::where('id', $empresa_id)->pluck('tipo_persona_id');
            $checklist = Checklist::select('documento','id','requerido') ->where('tipo_persona_id',$tipo_persona_id)->orderBy('orden', 'asc')->get();
            return view('cuentascorporativas::convenio.partials.ajax.checklist', compact('checklist'));
        } catch (Exception $ex) {
            return response()->json(['msg' => 'No se pudo eliminar el registro'], 202);
        }
    }
    
    public function store(ConveniosRequest $request) {
        //fill valuses in model
        $this->Convenios->fill($request->only('convenio_descripcion','duracion','tarifa_id','seguro_id','empresa_id','tipo_convenio'));
        //save model
        $this->Convenios->save();
        
        $destinationPath = config('cuentascorporativas.uploads_dir').'convenios'; // upload path
        $input = Input::all();
        foreach($input['checklist'] as $val){
           $extension = $val['nomarchivo']->getClientOriginalExtension(); // getting image extension
            $fileName = rand(11111,99999).'.'.$extension; // renameing image
            $val['nomarchivo']->move($destinationPath, $fileName); // uploading file to given path 
            ConvenioChklist::create(
                [
                'convenio_id' => $this->Convenios->id,
                'checklist_id' => $val['id'],
                'vigencia' => $val['vigencia'],
                'nomarchivo' =>$fileName,
                'ruta' =>$destinationPath
                ]);
        }
        
        
        flash()->success('Creación exitosa.');
        //redirect to index
        return redirect('convenios');
    }
    
    public function edit($id){
            $tarifa = TarifaListado::lists('nombre','id');
            $catalogo = Catalogo::lists('clave','id');
            $checklist = Checklist::select('documento','id','requerido') ->orderBy('orden', 'asc')->get();
            $convenio_tipo = DB::table('convenio_tipo')->orderBy('sort_order', 'asc')->lists('descripcion', 'id');
            $empresas = Empresas::lists('nombre','id');
            $Convenios = $this->Convenios->find($id);
            
            $convenio_chklist = ConvenioChklist::select('*')->
                    join('convenios_checklist as cc','cc.id','=','checklist_id')->
                    where('convenio_id', $id)->get();
            return view('cuentascorporativas::convenio.edit',compact('Convenios','tarifa','catalogo','checklist','empresas','convenio_tipo','convenio_chklist'));
    }
    
    public function show($id){
            $tarifa = TarifaListado::lists('nombre','id');
            $catalogo = Catalogo::lists('clave','id');
            $checklist = Checklist::select('documento','id','requerido') ->orderBy('orden', 'asc')->get();
            $convenio_tipo = DB::table('convenio_tipo')->orderBy('sort_order', 'asc')->lists('descripcion', 'id');
            $empresas = Empresas::lists('nombre','id');
            $Convenios = $this->Convenios->find($id);
            $convenio_chklist = ConvenioChklist::select('*')->
                    join('convenios_checklist as cc','cc.id','=','checklist_id')->
                    where('convenio_id', $id)->get();
            return view('cuentascorporativas::convenio.show',compact('Convenios','tarifa','catalogo','checklist','empresas','convenio_tipo','convenio_chklist'));
    }

    public function update(ConveniosRequest $request, $id) {
            $Convenios = $this->Convenios->findOrFail($id);
            //fill valuses in model
            $Convenios->fill([
                    'convenio_descripcion' =>$request['convenio_descripcion'],
                    'duracion' =>$request['duracion'],
                    'tarifa_id' =>$request['tarifa_id'],
                    'seguro_id' => $request['seguro_id'],
                    'empresa_id' => $request['empresa_id'],
                    'tipo_convenio' =>$request['tipo_convenio'] 
                    ]);
            //save model
            $Convenios->save();
            
            ConvenioChklist::where('convenio_id',$id)->delete();
            $destinationPath = config('cuentascorporativas.uploads_dir').'convenios'; // upload path
            $input = $request->all();
            
            foreach($input['checklist'] as $val){
                if(isset($val['nomarchivo'])){
               $extension = $val['nomarchivo']->getClientOriginalExtension(); // getting image extension
                $fileName = rand(11111,99999).'.'.$extension; // renameing image
                $val['nomarchivo']->move($destinationPath, $fileName); // uploading file to given path 
                }else{
                $fileName = $val['nomarchivo_old'];
                }
                
              $data =  ConvenioChklist::create(
                    [
                    'convenio_id' => $id,
                    'checklist_id' => $val['id'],
                    'vigencia' => $val['vigencia'],
                    'nomarchivo' =>$fileName,
                    'ruta' =>$destinationPath
                    ]);
            }
            // message
            flash()->success('Actualización exitosa.');
            return redirect('convenios');
    }
    
    public function destroy($id){
        try{
            $this->Convenios->destroy($id);
            ConvenioChklist::where('convenio_id', $id)->delete();
            return response()->json(['msg'=> 'Acuerdos corporativos agregados con éxito.' ],200);
        }catch (QueryException $e){
            return response()->json(['msg'=> 'Convenios Corporativos usada'],202);
        }
    }
}