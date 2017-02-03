<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Añadir Autos a la oficina</h4>
            </div>
            <div class="modal-body">
                @if(isset($locacion))
                    {!! Form::model($locacion,['route' => ['locacion.update', $locacion->id],'method'=>'PUT','id'=>'form_locacion','parsley-validate novalidate']  ) !!}
                @else
                    {{ Form::open(['route' => 'createroute']) }}
                @endif
                    <div class="form-group">
                        {!! Form::label('clase_id','Clases *') !!}
                         {!! Form::select('clase_id[]',$clases ,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','multiple','aria-hidden'=>'true','tabindex'=>'-1']) !!}
                    </div>
                    {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>