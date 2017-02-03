
<div class="form-group @if ($errors->has('estado_id')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Estado al que pertenece">
             Estado
         </span>
    </label>
    <div class="col-lg-8">
        {!! Form::select('estado_id',$estados,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%']) !!}
    </div>
</div>
<div class="form-group @if ($errors->has('nombre')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres Invalidos 0-9!<>?.$%&/.">
             Ciudad
         </span>
    </label>
    <div class="col-lg-8">
        {!! Form::text('nombre',null,['class' => 'form-control','id' => 'nombre']) !!}
    </div><!-- /.col  -->
</div><!-- /.form-group -->

<div class="form-group @if ($errors->has('acron')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Acrónimo de la ciudad debe tener máximo 3 caracteres, caracteres invalidos 0-9!<>,;?=+()@#">
             Acrónimo
         </span>
    </label><div class="col-lg-8">
        {!! Form::text('acron',null,['class' => 'form-control']) !!}
    </div><!-- /.col  -->
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('aip')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="El código de aeropuerto debe tener máximo 3 caracteres, caracteres invalidos 0-9!<>,;?=+()@# ">
             AIP
         </span>
    </label>
    <div class="col-lg-8">
        {!! Form::text('aip',null,['class' => 'form-control']) !!}
    </div><!-- /.col  -->
</div>