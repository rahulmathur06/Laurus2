
<div class="form-group @if ($errors->has('clave')) has-error @endif">
    <label class="required control-label  ">
        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
            DESCRIPCION ES-MX
        </span>
    </label>
    <div class="row">
        <div class="col-md-8">
            {!! Form::text('descripcion_esMX', null, ['id'=>'descripcion_esMX','class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            <label class="checkbox-inline">
            {!! Form::checkbox('activo', 1) !!} <span class="checkbox-text"> Activo</span>
            </label>
        </div>
    </div>
</div>

<div class="form-group @if ($errors->has('clave')) has-error @endif">
    <label class="required control-label  ">
        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
            DESCRIPCION EN-US   
        </span>
    </label>
    <div class="row">
        <div class="col-md-8">
            {!! Form::text('descripcion_enUS', null ,['id'=>'descripcion_enUS','class' => 'form-control']) !!}
        </div>
        <div class="col-md-4">
            <label class="checkbox-inline">
                {!! Form::checkbox('incrementable', 1) !!} <span class="checkbox-text"> Incrementable</span>
            </label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    COSTO EN MXN
                </span>
            </label>
            {!! Form::text('costo_mxn',null,['id'=>'costo_mxn','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-3 col-md-offset-2">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    COSTO EN USD
                </span>
            </label>
            {!! Form::text('costo_usd',null,['id'=>'costo_usd','class' => 'form-control']) !!}
        </div>
    </div>
</div>

