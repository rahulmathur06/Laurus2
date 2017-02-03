<div class="row">
    <div class="col-md-8">
        <div class="form-group @if ($errors->has('descripcion')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    DESCRIPCIÓN
                </span>
            </label>
            {!! Form::text('descripcion',null,['id'=>'descripcion','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('promocode')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    CODIGO PROMOCION
                </span>
            </label>
            {!! Form::text('promocode',null,['id'=>'promocode','class' => 'form-control']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('fechaini')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    F. INICIO
                </span>
            </label>
            {!! Form::text('fechaini',null,['id'=>'fechaini','class' => 'form-control jQueryUIDatepicker']) !!}
        </div>
    </div>
    <div class="col-md-8">
        <div class="form-group @if ($errors->has('fechafin')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    F. FIN
                </span>
            </label>
            <div class="row">
                <div class="col-md-6">
                    {!! Form::text('fechafin',null,['id'=>'fechafin','class' => 'form-control jQueryUIDatepickerwithFutureDate', 'readonly']) !!}
                </div>
                <div class="col-md-6">
                    <label class="checkbox-inline">
                        {!! Form::checkbox('activo', 1) !!} <span class="checkbox-text"> ACTIVA</span>
                    </label>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="form-group @if ($errors->has('tipo_promo')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    TIPO DE PROMOCION
                </span>
            </label>
            {!! Form::select('tipo_promo',$promo_types,null,['id'=>'tipo_promo','class' => 'form-control','onChange' => 'toggleFactorField(this.value)']) !!}
        </div>
    </div>
    <div class="col-md-4 factor-field-container" id="container-factor_mxm" style="display:none">
        <div class="form-group @if ($errors->has('factor_mxm')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    Dias Renta x Dias Gratis
                </span>
            </label>
            {!! Form::text('factor_mxm',null,['id'=>'factor_mxm','class' => 'form-control', 'disabled']) !!}
        </div>
    </div>

    <div class="col-md-4 factor-field-container" id="container-factor_dpor" style="display:none">
        <div class="form-group @if ($errors->has('factor_dpor')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    Porcentaje a descontar
                </span>
            </label>
            {!! Form::text('factor_dpor',null,['id'=>'factor_dpor','class' => 'form-control', 'disabled']) !!}
        </div>
    </div>

    <div class="col-md-4 factor-field-container" id="container-factor_ddia" style="display:none">
        <div class="form-group @if ($errors->has('factor_ddia')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    Dias Gratis
                </span>
            </label>
            {!! Form::text('factor_ddia',null,['id'=>'factor_ddia','class' => 'form-control', 'disabled']) !!}
        </div>
    </div>

    <div class="col-md-4 factor-field-container" id="container-factor_dcant" style="display:none">
        <div class="form-group @if ($errors->has('factor_dcant')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    Importe a Descontar
                </span>
            </label>
            {!! Form::text('factor_dcant',null,['id'=>'factor_dcant','class' => 'form-control', 'disabled']) !!}
        </div>
    </div>
</div>

