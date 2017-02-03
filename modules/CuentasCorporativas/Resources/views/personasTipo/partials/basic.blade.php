<fieldset>
<!--    <legend>Captura de Siniestro</legend>-->

    <div class='row'>
        <div class='col-md-2'>
            @if(isset($PersonasTipo))
            <div class="form-group @if ($errors->has('personas_id')) has-error @endif">
                <label class="control-label">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        ID
                    </span>
                </label>
                {!! Form::number('id',null,['id'=>'personas_id','class' => 'form-control', 'disabled' => true]) !!}
            </div><!-- /.form-group -->
            @endif
        </div>

        <div class='col-md-3 col-md-offset-7'>
            <div class="form-group @if ($errors->has('sort_order')) has-error @endif">
                <label class="control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Numero de puertas que contiene el automóvil. minimo 1 y máximo 5">
                        ORDEN
                    </span>
                </label>
                {!! Form::number('sort_order',null,['class' => 'form-control','id' => 'sort_order', 'required' => false, 'min' => 1]) !!}

            </div><!-- /.form-group -->
        </div>
    </div>

    <div class='row'>
        <div class='col-md-12'>
            <div class="form-group @if ($errors->has('poliza')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                        TIPO DE PERSONA
                    </span>
                </label>

                {!! Form::text('descripcion',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'descripcion']) !!} 
            </div><!-- /.form-group -->
        </div>
    </div> 


</fieldset>