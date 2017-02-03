<div class='row'>
    <div class='col-md-6'>
        <div class="form-group @if ($errors->has('rfc')) has-error @endif">
            <label class="control-label col-md-4">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    RFC
                </span>
            </label>
            <div class="col-md-8">
                {!! Form::text('rfc',null,['id'=>'rfc','class' => 'form-control']) !!}
            </div>
        </div><!-- /.form-group -->
    </div>

    <div class='col-md-6'>
        <div class="form-group @if ($errors->has('empresas_codigo')) has-error @endif">
            <label class="control-label col-md-4">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Numero de puertas que contiene el automóvil. minimo 1 y máximo 5">
                    Código
                </span>
            </label>
            <div class="col-md-8">
                {!! Form::number('empresas_codigo',null,['class' => 'form-control','id' => 'empresas_codigo']) !!}
            </div>

        </div><!-- /.form-group -->
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <div class="form-group @if ($errors->has('nombre')) has-error @endif">
            <label class=" control-label col-md-2">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                    Nombre
                </span>
            </label>

            <div class="col-md-10">
                {!! Form::text('nombre',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'nombre']) !!}
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->

<div class='row'>
    <div class='col-md-12'>
        <div class="form-group @if ($errors->has('razon_social')) has-error @endif">
            <label class=" control-label col-md-2">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                    Razón Social
                </span>
            </label>

            <div class="col-md-10">
                {!! Form::text('razon_social',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'razon_social']) !!}
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->

<div class='row'>
    <div class='col-md-12'>
        <div class="form-group @if ($errors->has('giro')) has-error @endif">
            <label class=" control-label col-md-2">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                    Giro
                </span>
            </label>

            <div class="col-md-10">
                {!! Form::text('giro',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'giro']) !!}
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->

<div class='row'>
    <div class='col-md-12'>
        <div class="form-group @if ($errors->has('direccion_calle')) has-error @endif">
            <label class=" control-label col-md-2">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                    Calle
                </span>
            </label>

            <div class="col-md-10">
                {!! Form::text('direccion_calle',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'direccion_calle']) !!}
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->

<div class='row'>
    <div class='col-md-12'>
        <div class="form-group @if ($errors->has('direccion_colonia')) has-error @endif">
            <label class=" control-label col-md-2">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                    Colonia
                </span>
            </label>

            <div class="col-md-10">
                {!! Form::text('direccion_colonia',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'direccion_colonia']) !!}
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->

<div class='row'>
    <div class='col-md-12'>
        <div class="form-group @if ($errors->has('direccion_estado')) has-error @endif">
            <label class=" control-label col-md-2">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                    Estado
                </span>
            </label>

            <div class="col-md-10">
                {!! Form::select('direccion_estado',$estados,null,['class'=>'form-control select2','style'=>'width :100%', 'id' => 'direccion_estado', 'onchange' => 'get_city_from_state(this.value, "'.URL::to('statetocity').'")']) !!}
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->

<div class='row'>
    <div class='col-md-12'>
        <div class="form-group @if ($errors->has('direccion_ciudad')) has-error @endif">
            <label class=" control-label col-md-2">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                    Ciudad
                </span>
            </label>

            <div class="col-md-10">
                <div id="ciudads">
                    @if(isset($ciudades))
                        {!! Form::select('direccion_ciudad',$ciudades,null,['class'=>'form-control select2','style'=>'width :100%', 'id' => 'direccion_ciudad']) !!}
                    @else
                        {!! Form::select('direccion_ciudad',[''=>'select city'],null,['class'=>'form-control select2','style'=>'width :100%', 'id' => 'direccion_ciudad', 'disabled' => true]) !!}
                    @endif
                </div>
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->

<div class='row'>
    <div class='col-md-6'>
        <div class="form-group @if ($errors->has('direccion_municipio')) has-error @endif">
            <label class="control-label col-md-4">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    Municipio
                </span>
            </label>
            <div class="col-md-8">
                {!! Form::text('direccion_municipio',null,['id'=>'direccion_municipio','class' => 'form-control']) !!}
            </div>
        </div><!-- /.form-group -->
    </div>

    <div class='col-md-6'>
        <div class="form-group @if ($errors->has('direccion_codigo_postal')) has-error @endif">
            <label class="control-label col-md-4">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Numero de puertas que contiene el automóvil. minimo 1 y máximo 5">
                    CP
                </span>
            </label>
            <div class="col-md-8">
                {!! Form::text('direccion_codigo_postal',null,['class' => 'form-control','id' => 'direccion_codigo_postal', 'required' => false, 'onKeyDown' => 'return isKeyAllowed(event)']) !!}
            </div>

        </div><!-- /.form-group -->
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <div class="form-group @if ($errors->has('empresaPadre')) has-error @endif">
            <label class=" control-label col-md-2">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                    Subsidiaria de
                </span>
            </label>

            <div class="col-md-10">
                {!! Form::select('empresaPadre', $empresas, null, ['class'=>'form-control select2','style'=>'width :100%', 'id' => 'empresaPadre']) !!}
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->