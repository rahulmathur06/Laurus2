
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