
<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Comentarios</h4>
        </div>
        <div class="modal-body">
            <div class='row'>
                <div class='col-md-12'>
                    <div class="form-group @if ($errors->has('comentarios')) has-error @endif">
                        <div class="col-md-10">
                            {!! Form::textarea('comentarios',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'comentarios']) !!}
                        </div> 
                    </div><!-- /.form-group -->
                </div>
            </div> <!-- / .row-->
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>

</div>
