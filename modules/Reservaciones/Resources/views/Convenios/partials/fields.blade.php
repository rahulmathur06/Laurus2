<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('nombre')) has-error @endif">
            <label class="required control-label ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre">
            Nombre
         </span>
            </label>
            {!! Form::text('nombre',null,['class' => 'form-control']) !!}
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col -->
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('acronimo')) has-error @endif">
            <label class="required control-label ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos 0-9·$%&/()=?¿. Maximo 3">
                Acronimo
             </span>
            </label>
            {!! Form::text('acronimo',null,['class' => 'form-control']) !!}
        </div>
        <!-- /.form-group -->

    </div>
    <!-- /.col -->
    <div class="col-md-2">
        <div class="form-group @if ($errors->has('idioma')) has-error @endif">
            <label class="required control-label ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Seleccione un idioma">
                Idioma
             </span>
            </label>
            {!! Form::select('idioma', ['es-MX' => 'Español', 'en-Us' => 'Ingles'],null,['class'=>'form-control']) !!}
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col -->
    <div class="col-md-2">
        <div class="form-group @if ($errors->has('moneda')) has-error @endif">
              <label class="required control-label ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos 0-9·$%&/()=?¿. Maximo 3">
                Moneda
             </span>
            </label>
            {!! Form::select('moneda', ['MXN' => 'MXN', 'USD' => 'USD'],null,['class'=>'form-control']) !!}

        </div>
        <!-- /.form-group -->
    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-2">
        <div class="form-group @if ($errors->has('horas_tolerancia')) has-error @endif">
            <label class="required control-label ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos A-Z·$%&/()=?¿">
               Horas de tolerancia
             </span>
            </label>
            {!! Form::text('horas_tolerancia',null,['class' => 'form-control']) !!}
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col -->
    <div class="col-md-2">
        <div class="form-group @if ($errors->has('dias_semana')) has-error @endif">
            <label class="required control-label ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos A-Z·$%&/()=?¿.">
               Días de la semana
             </span>
            </label>
            {!! Form::text('dias_semana',null,['class' => 'form-control']) !!}
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col -->
    <div class="col-md-2">
        <div class="form-group @if ($errors->has('dias_mes')) has-error @endif">
            <label class="required control-label ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos A-Z·$%&/()=?¿.">
               Días del mes
             </span>
            </label>
            {!! Form::text('dias_mes',null,['class' => 'form-control']) !!}
        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col -->

    <div class="col-md-6">
        <div class="form-group @if ($errors->has('tipo')) has-error @endif">
            <label class="required control-label ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Seleccione una tipo">
            Tipo
             </span>
            </label>
            {!! Form::select('tipo',$tipos,null,['class'=>'form-control']) !!}

        </div>
        <!-- /.form-group -->
    </div>
    <!-- /.col -->

</div>
<!-- /.row -->
<div class="row">

    <div class="col-md-4">
        <div class="form-group @if ($errors->has('prepago_habilitado')) has-error @endif">
            <label class="required control-label ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Activar el prepago habilitado">
               Prepago habilitado
             </span>
            </label>
            {!! Form::select('prepago_habilitado',$value,null,['class'=>'form-control']) !!}

        </div>


    </div>
    <div class="col-md-4">

        <div class="form-group @if ($errors->has('descuento_ppgo_habilitado')) has-error @endif">
            <label class="required control-label ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Activar el descuento de prepago habilitado.">
               descuento de prepago habilitado
             </span>
            </label>
            {!! Form::select('descuento_ppgo_habilitado',$value,null,['class'=>'form-control']) !!}
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group @if ($errors->has('activo')) has-error @endif">
            <label class="required control-label ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Activar el registro">
               Activo
             </span>
            </label>
            {!! Form::select('activo',$value,null,['class'=>'form-control']) !!}

        </div>

    </div>
</div>
<!-- /.row -->
<div class="row">
    <div class="col-md-12">
        <label class="required control-label ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Descripción">
                Descripción
             </span>
        </label>

            <div class="form-group">
                {!! Form::textarea('descripcion', null, ['style'=>'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}

            </div>
        </div>
    </div>
</div>
<!-- /.row -->