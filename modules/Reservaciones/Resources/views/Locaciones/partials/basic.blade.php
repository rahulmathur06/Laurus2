
<div class="form-group @if ($errors->has('grupo')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Gurpo al que pertenece">
             Grupo
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::select('grupo',$grupos,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%']) !!}
    </div>
</div><!-- /.form-group  -->
<div class="form-group @if ($errors->has('orden')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos a-z·$%&/().">
            Orden
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('orden',null,['class' => 'form-control','id' => 'orden']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('ciudad_id')) has-error @endif">
    {!! Form::label('ciudad_id','Ciudad *',['class' =>'col-lg-2 control-label']) !!}
    <div class="col-lg-8">
    {!! Form::select('ciudad_id',$ciudades,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%']) !!}
    </div>
</div><!-- /.form-group  -->

<div class="form-group @if ($errors->has('clave')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="clave de la locacion, caracteres invalidos #$%&/()">
             Clave
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('clave',null,['class' => 'form-control','id' => 'clave']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('iva')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tiene que ser un valor decimal">
             IVA
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('iva',$iva,['class' => 'form-control','id' => 'iva']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('imagen')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Estado al que pertenece la ciudad">
            Imagen
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::file('imagen',null,['class' => 'form-control','id' => 'imagen']) !!}
    </div>
</div><!-- /.form-group -->

<div class="form-group @if ($errors->has('clave_jr')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Clave JR, para compatibilidad, caracteres invalidos #$%&/()">
             Clave Jr
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('clave_jr',null,['class' => 'form-control','id' => 'clave_jr']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('airportfee')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tiene que ser un valor decimal">
             Airportfee
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('airportfee',null,['class' => 'form-control','id' => 'airportfee']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('activo')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Activo">
             Activo
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::select('activo',$activo,null,['class'=>'form-control']) !!}
    </div><!-- /.form-group -->
</div>