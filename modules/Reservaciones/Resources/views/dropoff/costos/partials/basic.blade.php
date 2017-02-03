<div class="row">
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        Fecha Inicial
                    </span>
                </label>
                {!! Form::text('fecha_ini',null,['id'=>'fecha_ini','class' => 'form-control jQueryUIDatepicker']) !!}
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        Fecha Final
                    </span>
                </label>
                {!! Form::text('fecha_fin',null,['id'=>'fecha_fin','class' => 'form-control jQueryUIDatepickerwithFutureDate']) !!}
            </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        Costo MN
                    </span>
                </label>
                {!! Form::text('valor_mxn',null,['id'=>'valor_mxn','class' => 'form-control']) !!}
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        Costo USD
                    </span>
                </label>
                {!! Form::text('valor_usd',null,['id'=>'valor_usd','class' => 'form-control']) !!}
            </div>
    </div>
</div>

