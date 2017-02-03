    
<div class="form-group location-select-group @if ($errors->has('ciudad_pickup_id')) has-error @endif" id="ciudad_pickup_id_group">
    <label class="required control-label  ">
        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
            LOCACIÓN PICK UP
        </span>
    </label>
    <div class="row">
        <div class="col-md-11">
            {!! Form::select('ciudad_pickup_id', $locaciones, null, ['id'=>'ciudad_pickup_id','class' => 'form-control select2', 'onChange'=> 'onLocationChange(this.value, setOrigin)']) !!}
        </div>
        <div class="col-md-1" id="loader_pickup" style="display:none">
            <img src="/img/reservaciones/loader.gif" alt="loader">
        </div>
    </div>
</div>

<div class="form-group location-select-group @if ($errors->has('ciudad_dropoff_id')) has-error @endif" id="ciudad_dropoff_id_group">
    <label class="required control-label  ">
        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
            LOCACIÓN DROP OFF   
        </span>
    </label>
    <div class="row">
        <div class="col-md-11">
            {!! Form::select('ciudad_dropoff_id', $locaciones, null, ['id'=>'ciudad_dropoff_id','class' => 'form-control select2', 'onChange' => 'onLocationChange(this.value, setDestination)']) !!}
        </div>
        <div class="col-md-1" id="loader_dropoff" style="display:none">
            <img src="/img/reservaciones/loader.gif" alt="loader">
        </div>
    </div>
</div>
<div id="common-alert"></div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('distancia_calc')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    DISTANCIA CALCULADA
                </span>
            </label>
            {!! Form::text('distancia_calc',null,['id'=>'distancia_calc','class' => 'form-control', 'readonly']) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('distancia')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    DISTANCIA A UTILIZAR
                </span>
            </label>
            {!! Form::text('distancia',null,['id'=>'distancia','class' => 'form-control']) !!}
        </div>
    </div>
</div>
