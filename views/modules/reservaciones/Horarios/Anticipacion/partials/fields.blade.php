<div class="form-group @if ($errors->has('locacion_id')) has-error @endif">
    <label class="required control-label col-lg-2 ">
        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Seleccione una locación para agregar una anticipación">
            Locación
        </span>
    </label>
    <div class="col-lg-8 ">
        {!! Form::select('locacion_id',$locaciones,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%','id'=>'locacionSelect']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('clase_id')) has-error @endif">
    <label class="required control-label col-lg-2 ">
        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Seleccione una clase de automovil">
            Clase
        </span>
    </label>
    <div class="col-lg-8" id="position">
        {!! Form::select('clase_id',$clases,null,['class'=>'form-control select2','style'=>'width :100%','id'=>'clase_id']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('min_tiempo')) has-error @endif">
    <label class="required control-label col-lg-2 ">
        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tiempo minimo debe de ser en minutos">
            Tiempo minimo
        </span>
    </label>
    <div class="col-lg-8">
        {!! Form::text('min_tiempo',null,['class' => 'form-control','id' => 'min_tiempo']) !!}
    </div>
</div><!-- /.form-group -->