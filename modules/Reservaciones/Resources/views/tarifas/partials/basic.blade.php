<div class="row">
    <div class="col-md-8">
        <div class="form-group @if ($errors->has('nombre')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        NOMBRE
                    </span>
                </label>
                {!! Form::text('nombre',null,['id'=>'nombre','class' => 'form-control']) !!}
            </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('status')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        STATUS
                    </span>
                </label>
            @if(isset($status))
                {!! Form::text('status',$status[$Tarifa->status],['id'=>'status','class' => 'form-control', 'disabled']) !!}
            @else
                {!! Form::text('status','PRECIOS PENDIENTES',['id'=>'status','class' => 'form-control', 'disabled']) !!}
            @endif
            </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group @if ($errors->has('descripcion')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        DESCRIPCIÓN
                    </span>
                </label>
                {!! Form::text('descripcion',null,['id'=>'descripcion','class' => 'form-control']) !!}
            </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('f_ini')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        F. INICIO
                    </span>
                </label>
                {!! Form::text('f_ini',null,['id'=>'f_ini','class' => 'form-control jQueryUIDatepicker']) !!}
            </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('f_fin')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        F. FIN
                    </span>
                </label>
                {!! Form::text('f_fin',null,['id'=>'f_fin','class' => 'form-control jQueryUIDatepickerwithFutureDate', 'readonly']) !!}
            </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('moneda')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        MONEDA
                    </span>
                </label>
                {!! Form::select('moneda', ['USD' => 'USD', 'MXN' => 'MXN'], null,['id'=>'moneda','class' => 'form-control']) !!}
            </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('tipo')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                        TIPO DE TARIFA
                    </span>
                </label>
                {!! Form::select('tipo', $tarifa_tipos,null,['id'=>'tipo','class' => 'form-control', 'onchange' => 'jQuery.getDetails(this.value)']) !!}
            </div>
    </div>
</div>

