
<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h3 class="modal-title">Historial de Tareas</h3>
        </div>
        <div class="modal-body empresa-registration">
            <div class="panel panel-default">
                <div class="panel panel-heading">
                    <div class='row'>
                        <div class='col-md-12'>
                            <div class="form-group @if ($errors->has('ejecutiva_id')) has-error @endif">
                                <label class=" control-label col-md-2">
                                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                                        Empresa
                                    </span>
                                </label>

                                <div class="col-md-10">
                                    {!! Form::text('empresa_name', $Empresa->nombre, ['class'=>'form-control','style'=>'width :100%', 'id' => 'empresa_name', 'readonly']) !!}
                                </div> 
                            </div><!-- /.form-group -->
                        </div>
                    </div> <!-- / .row-->
                </div>
                <div class="panel-body">
                    <table id="datatable_altered" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Tipo De Teria</th>
                                <th>Fecha Limite</th>
                                <th>Status</th>
                                <th>Notas</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                            <tr>
                                <td>{{$task->type}}</td>
                                <td>{{\Carbon\Carbon::parse($task->due_date)->format('d-m-Y')}}</td>
                                <td>{{$task->status}}</td>
                                <td>{{$task->comment}}</td>
                                <td class="btn-group btn-group-xs">
                                    @if($task->task_status == 0)
                                    
                                    <a class="btn btn-success "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="mark"
                                       data-url="{{route('empresas.completed',$task->id)}}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="mark"
                                       data-url="{{route('empresas.cancelled',$task->id)}}">
                                        <i class="fa fa-close"></i></a>
                                    @else
                                    
                                    <a class="btn btn-success disabled"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger disabled"><i class="fa fa-close"></i></a>
                                    
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>

</div>
