<fieldset>
<!--    <legend>Captura de Siniestro</legend>-->

    <div class='row'>
        <div class='col-md-3'>
            <div class="form-group @if ($errors->has('clave')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        UNIDAD
                    </span>
                </label>
                {!! Form::select('clave',$claves,null,['id'=>'clave','class' => 'form-control select2']) !!}
            </div><!-- /.form-group -->
        </div>

        <div class='col-md-9'>
            <div class="form-group @if ($errors->has('numSiniestro')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Numero de puertas que contiene el automóvil. minimo 1 y máximo 5">
                        DESCRIPCIÓN
                    </span>
                </label>
                {!! Form::text('description',null,['class' => 'form-control','id' => 'description','readonly']) !!}

            </div><!-- /.form-group -->
        </div>
    </div>

    <div class='row'>
        <div class='col-md-3'>
            <div class="form-group @if ($errors->has('sucursal')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Numero de puertas que contiene el automóvil. minimo 1 y máximo 5">
                        SUCURSAL
                    </span>
                </label>
                {!! Form::select('sucursal',$sucursar,null,['class' => 'form-control select2','id' => 'sucursal']) !!}

            </div>
        </div>

        <div class='col-md-3'>
            <div class="form-group @if ($errors->has('numSiniestro')) has-error @endif">
                <label class="required control-label ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Minimo de equipaje del automóvil">
                        SINIESTRO
                    </span>
                </label>
                {!! Form::text('numSiniestro',null,['class' => 'form-control','id' => 'numSiniestro']) !!}

            </div><!-- /.form-group -->
        </div>


        <div class='col-md-2'>
            <div class="form-group @if ($errors->has('numReporte')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de transmision del automóvil">
                        REPORTE
                    </span>
                </label>

                {!! Form::text('numReporte',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'numReporte']) !!}
            </div><!-- /.form-group  -->
        </div>
        <div class='col-md-2'>
            <div class="form-group @if ($errors->has('inciso')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                        INCISO
                    </span>
                </label>

                {!! Form::text('inciso',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'inciso']) !!}

            </div><!-- /.form-group -->
        </div>
        <div class='col-md-2'>
            <div class="form-group @if ($errors->has('poliza')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                        PÓLIZA
                    </span>
                </label>

                {!! Form::text('poliza',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'poliza']) !!} 
            </div><!-- /.form-group -->
        </div>
    </div> 

    <div class='row'>
        <div class='col-md-3'>
            <div class="form-group @if ($errors->has('fecha_del_siniestro')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Máximo de equipaje del automóvil">
                        FECHA DEL SINIESTRO
                    </span>
                </label>
                {!! Form::text('fecha_del_siniestro',null,['class' => 'form-control jQueryUIDatepicker','id' => 'fecha_del_siniestro', 'placeholder' => 'yyyy-mm-dd']) !!}

            </div><!-- /.form-group -->

        </div>

        <div class='col-md-3'> 
            <div class="form-group @if ($errors->has('tipo_siniestro')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Clase a la que pertenece el automóvil">
                        TIPO DE SINIESTRO
                    </span>
                </label>

                {!! Form::text('tipo_siniestro',null,['class'=>'form-control','style'=>'width :100%','id' => 'tipo_siniestro']) !!}
            </div><!-- /.form-group  -->
        </div>

        <!-- Button -->
        <div class='col-md-3'>
            @if(isset($fueraservicio))
                <div class="form-group">
                    <label class="void"></label>
                    <div class='formActionButton'>
                        <button data-toggle="modal" data-target="#popupAdditionalFieldsForPerdidaTotal" type="button" class="btn btn-primary" id="enviar">Generar Registro de Pérdida Total</button>
                    </div>
                </div>
            @endif
        </div>
        
        <div class='col-md-3'></div>  
    </div>  

    <div class='row'>
        <div class='col-md-7'>
            <div class="form-group @if ($errors->has('comentarios')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Cantidad de numero de pasajeros. Caracteres invalidos ·$%&/()=?A-Z">
                        COMENTARIOS
                    </span>
                </label>
                {!! Form::textarea('comentarios',null,['class' => 'form-control','id' => 'comentarios']) !!}

            </div><!-- /.form-group -->
        </div>

        <div class='col-md-5'></div> 
    </div>


</fieldset>