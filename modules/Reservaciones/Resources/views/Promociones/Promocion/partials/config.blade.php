
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('acumular_prepago')) has-error @endif">
            {!! Form::label('acumular_prepago','Acumular prepago *') !!}
            {!! Form::select('acumular_prepago',$value,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','aria-hidden'=>'true','tabindex'=>'-1']) !!}
        </div>
        <div class="form-group @if ($errors->has('visible')) has-error @endif">
            {!! Form::label('visible','Visible *') !!}
            {!! Form::select('visible',$value,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','aria-hidden'=>'true','tabindex'=>'-1']) !!}
        </div>
        <div class="form-group @if ($errors->has('moneda')) has-error @endif">
            {!! Form::label('moneda','Moneda *') !!}
            {!! Form::select('moneda',$moneda,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','aria-hidden'=>'true','tabindex'=>'-1']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('tarifa_desglozada')) has-error @endif">
            {!! Form::label('tarifa_desglozada','Tarifa desglozada *') !!}
            {!! Form::select('tarifa_desglozada',$value,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','aria-hidden'=>'true','tabindex'=>'-1']) !!}
        </div>
        <div class="form-group @if ($errors->has('activo')) has-error @endif">
            {!! Form::label('activo','Activo *') !!}
            {!! Form::select('activo',$value,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','aria-hidden'=>'true','tabindex'=>'-1']) !!}
        </div>
        <div class="form-group @if ($errors->has('tipo_promocion')) has-error @endif">
            {!! Form::label('tipo_promocion','Tipo de promoción *') !!}
            {!! Form::select('tipo_promocion',$tipo,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','aria-hidden'=>'true','tabindex'=>'-1']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('mostrar_descuento')) has-error @endif">
            {!! Form::label('mostrar_descuento','Mostrar descuento*') !!}
            {!! Form::select('mostrar_descuento',$value,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','aria-hidden'=>'true','tabindex'=>'-1']) !!}
        </div>
        <div class="form-group @if ($errors->has('destino_mes')) has-error @endif">
            {!! Form::label('destino_mes','Destino mes *') !!}
            {!! Form::select('destino_mes',$value,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','aria-hidden'=>'true','tabindex'=>'-1']) !!}
        </div>

        <div class="form-group @if ($errors->has('acumular_prepago_valor')) has-error @endif">
            {!! Form::label('acumular_prepago_valor','Acumular prepago del valor*') !!}
            {!! Form::text('acumular_prepago_valor',null,['class' => 'form-control']) !!}

        </div>
    </div>

