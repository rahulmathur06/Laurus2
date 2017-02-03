<div class="row">
    <div class="col-md-8">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="required control-label  ">
                <span>
                    Locación
                </span>
            </label>
            {!! Form::select('locacion_id', $locacion, null,['id'=>'locacion_id','class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="required control-label  ">
                <span>
                    Autos
                </span>
            </label>
            {!! Form::select('auto_id', $autos, null,['id'=>'auto_id','class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
                <label class="required control-label  ">
                    <span>
                        Fecha Inicio
                    </span>
                </label>
                {!! Form::text('fecha_ini',null,['id'=>'f_ini','class' => 'form-control jQueryUIDatepicker', 'readonly']) !!}
            </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
                <label class="required control-label  ">
                    <span>
                        Fecha Fin
                    </span>
                </label>
                {!! Form::text('fecha_fin',null,['id'=>'fecha_fin','class' => 'form-control jQueryUIDatepickerwithFutureDate', 'readonly']) !!}
            </div>
    </div>
    
</div>

<div class="row">
    <div class="col-md-8">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
                <label class="required control-label  ">
                    <span>
                        Motivo
                    </span>
                </label>
                {!! Form::textarea('motivo',null,['id'=>'motivo','class' => 'form-control']) !!}
            </div>
    </div>
</div>



