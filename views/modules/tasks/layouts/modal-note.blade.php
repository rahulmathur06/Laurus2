<!-- modal -->
<div class="modal fade" id="task-modal" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content"><div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">test</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="notes"></div>
                            {!! Form::open(['route' => 'tasks.savenote','method'=>'POST','id'=>'task-update','accept-charset'=> 'UTF-8' ]) !!}
                            <input type="hidden" name="task_id" value="">
                            <div class="form-group" id="comment">
                                <label for="note">Nota</label>
                                <textarea name="comment" id="note" class="form-control"></textarea>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="btn-group btn-group-xs">
                    <button type="button" class="btn btn-primary btn-flat" data-toggle="task-note-save"><i class="fa fa-save"></i> Guardar</button>
                    <button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fa fa-remove"></i> Cerrar</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>