<div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><strong>Accidente</strong> &#x2794; <strong>Pérdida Total</strong></h4>
        </div>
        <div class="modal-body">
            {!! Form::open(['method'=>'POST','id'=>'form_perdida_total_additional','parsley-validate novalidate']) !!}
            <fieldset>
                <!--    <legend></legend>-->
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group @if ($errors->has('ciudad')) has-error @endif">
                            <label class="required control-label  ">
                                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire ciudad">
                                    CIUDAD
                                </span>
                            </label>

                            {!! Form::select('ciudad',$ciudad,null,['id'=>'ciudad','class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%']) !!}
                        </div><!-- /.form-group -->
                    </div>

                    <div class="col-md-3">
                        <div class="form-group @if ($errors->has('cobertura')) has-error @endif">
                            <label class="required control-label  ">
                                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="cobertura de equipaje del automóvil">
                                    COBERTURA
                                </span>
                            </label>
                            {!! Form::text('cobertura',null,['class' => 'form-control','id' => 'cobertura']) !!}

                        </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-3">
                        <div class="form-group @if ($errors->has('deducible')) has-error @endif">
                            <label class="required control-label  ">
                                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Grupo al que pertenece el deducible">
                                    DEDUCIBLE
                                </span>
                            </label>
                            {!! Form::text('deducible',null,['class'=>'form-control','style'=>'width :100%']) !!}
                        </div><!-- /.form-group  -->
                    </div>
                    <div class="col-md-3">
                        <div class="form-group @if ($errors->has('recuperacion')) has-error @endif">
                            <label class="required control-label  ">
                                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="recuperacion al que pertenece el automóvil">
                                    RECUPERACIÓN  
                                </span>
                            </label>
                            {!! Form::text('recuperacion',null,['class'=>'form-control','style'=>'width :100%']) !!}
                        </div><!-- /.form-group  -->
                    </div>
                </div><!-- /.row -->

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group @if ($errors->has('num_contrato')) has-error @endif">
                            <label class="required control-label  ">
                                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Cantidad de numero de pasajeros. Caracteres invalidos ·$%&/()=?A-Z">
                                    NUM. CONTRATO
                                </span>
                            </label>
                            {!! Form::text('num_contrato',null,['class' => 'form-control','id' => 'num_contrato']) !!}

                        </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-3">
                        <div class="form-group @if ($errors->has('contrato_inicio')) has-error @endif">
                            <label class="required control-label  ">
                                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Cantidad de numero de pasajeros. Caracteres invalidos ·$%&/()=?A-Z">
                                    FECHA INICIO
                                </span>
                            </label>
                            {!! Form::text('contrato_inicio',null,['class' => 'form-control jQueryUIDatepickerstart','id' => 'contrato_inicio']) !!}
                        </div><!-- /.form-group -->
                    </div>

                    <div class="col-md-3">
                        <div class="form-group @if ($errors->has('contrato_fin')) has-error @endif">
                            <label class="required control-label  ">
                                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Cantidad de numero de pasajeros. Caracteres invalidos ·$%&/()=?A-Z">
                                    FECHA TÉRMINO
                                </span>
                            </label>
                            {!! Form::text('contrato_fin',null,['class' => 'form-control jQueryUIDatepickerwithFutureDate','id' => 'contrato_fin']) !!}
                        </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-3">
                        <div class="form-group @if ($errors->has('cliente')) has-error @endif">
                            <label class="required control-label  ">
                                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Cantidad de numero de cliente. Caracteres invalidos ·$%&/()=?A-Z">
                                    CLIENTE
                                </span>
                            </label>
                            {!! Form::text('cliente',null,['class' => 'form-control','id' => 'cliente']) !!}
                        </div><!-- /.form-group -->
                    </div>

                </div>
            </fieldset>
            
            {!! Form::close() !!}
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-success" id="btnMoveToPerdida" onclick="moveToPerdidaTotal()"><i class="fa fa-save"></i> Guardar</button>
            <button type="button" class="btn btn-default" id="btnCancelMoveToPerdida" data-dismiss="modal"><i class="fa fa-remove"></i> Cancelar</button>
        </div>
    </div>

</div>