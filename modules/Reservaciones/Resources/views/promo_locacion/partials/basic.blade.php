
<div class="form-group @if ($errors->has('promo_id')) has-error @endif">
    <label class="required control-label  ">
        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
            PROMOCIÓN
        </span>
    </label>
    {!! Form::select('promo_id',$promos,null,['id'=>'promo_id','class' => 'form-control']) !!}
</div>

<div class="form-group @if ($errors->has('locacion_id')) has-error @endif">
    <label class="required control-label  ">
        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
            LOCACIÓN
        </span>
    </label>
    <div class="row">
        <div class="col-md-9">
            {!! Form::select('locacion_id',$locaciones,null,['id'=>'locacion_id','class' => 'form-control']) !!}
        </div>
        <div class="col-md-3">
            <button type="button" class="btn btn-info" id="getclasesbutton" onclick="getClases(document.getElementById('locacion_id').value)">OBTENER AUTOS</button>
        </div>
    </div>
</div>
<div id="clase_container">
</div>

