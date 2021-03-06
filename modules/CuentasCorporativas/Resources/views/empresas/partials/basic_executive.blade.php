
<div class='row'>
    <div class='col-md-12'>
        <div class="form-group @if ($errors->has('ejecutiva_id')) has-error @endif">
            <label class=" control-label col-md-2">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                    Ejecutiva
                </span>
            </label>

            <div class="col-md-10">
                {!! Form::select('ejecutiva_id', $ejecutivas, null, ['class'=>'form-control select2','style'=>'width :100%', 'id' => 'ejecutiva_id']) !!}
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->
@if(isset($Empresa))
<div class='row'>
    <div class='col-md-3 col-md-offset-3'>
        <div class="form-group">
            <label class=" control-label col-md-2">
            </label>
            <div class="col-md-10">
                <button type="button" data-toggle="modal" data-target="#TaskAssignmentModal" class="btn btn-primary" id="assign_task">Asignar Tarea</button>
            </div> 
        </div><!-- /.form-group -->
    </div>


    <div class='col-md-3'>
        <div class="form-group">
            <label class=" control-label col-md-2">
            </label>
            <div class="col-md-10">
                <button type="button" data-toggle="modal"@if ($tasks->count() != 0) data-target="#TaskHistoryModal"  class="btn btn-primary active" @else class="btn disabled"  @endif class="btn btn-primary active" id="assign_task">Historial de Tareas</button>
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->
@endif