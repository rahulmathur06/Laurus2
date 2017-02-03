<fieldset>
    <!--    <legend></legend>-->
    <div class="row">
        <div class="col-md-4">
            <div class="form-group @if ($errors->has('Clave')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de transmision del automóvil">
                        UNIDAD
                    </span>
                </label>

                {!! Form::select('clave',$clave,null,['id'=>'clave','class'=>'form-control select3 select2-hidden-accessible','style'=>'width :100%']) !!}
            </div><!-- /.form-group  -->
        </div>
        <div class="col-md-8">
            <div class="form-group @if ($errors->has('description')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        UNIDAD DESCRIPCIÓN
                    </span>
                </label>
                {!! Form::text('description',null,['class' => 'form-control','id' => 'description','readonly']) !!}
            </div><!-- /.form-group -->
        </div>

    </div>
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
            <div class="form-group @if ($errors->has('sucursal')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                        SUCURSAL
                    </span>
                </label>
                <?php $sucursal = array('1' => 'Branch'); ?>
                <div id="branch">
                {!! Form::select('sucursal',$sucursal,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%', 'id' => 'sucursalAutoFill']) !!}
                </div>
            </div><!-- /.form-group -->
        </div>

        <div class="col-md-3">
            <div class="form-group @if ($errors->has('numReporte')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="numReporte de equipaje del automóvil">
                        SINIESTRO
                    </span>
                </label>
                {!! Form::text('numReporte',null,['class' => 'form-control','id' => 'numReporte']) !!}

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
    </div><!-- /.row -->
    <div class="row">
        <div class="col-md-3">
            <div class="form-group @if ($errors->has('fecha_del_siniestro')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Cantidad de numero de pasajeros. Caracteres invalidos ·$%&/()=?A-Z">
                        FECHA REPORTE
                    </span>
                </label>
                {!! Form::text('fecha_del_siniestro',null,['class' => 'form-control jQueryUIDatepicker','id' => 'pasajeros']) !!}

            </div><!-- /.form-group -->
        </div>
        <div class="col-md-3">
            <div class="form-group @if ($errors->has('tipo_siniestro')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Clase a la que pertenece el automóvil">
                        TIPO DE SINIESTRO
                    </span>
                </label>
                {!! Form::text('tipo_siniestro',null,['class'=>'form-control','style'=>'width :100%']) !!}
            </div><!-- /.form-group  -->
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

    </div>

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
                {!! Form::text('contrato_inicio',null,['class' => 'form-control jQueryUIDatepicker','id' => 'contrato_inicio']) !!}
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
    <div class="row">
        <div class="col-md-7">
            <div class="form-group @if ($errors->has('comentarios')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Cantidad de numero de pasajeros. Caracteres invalidos ·$%&/()=?A-Z">
                        COMENTARIOS
                    </span>
                </label>
                {!! Form::textarea('comentarios',null,['class' => 'form-control','id' => 'comentarios']) !!}
            </div><!-- /.form-group -->
        </div>
    </div>

</fieldset>