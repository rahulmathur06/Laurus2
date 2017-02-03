
<div class="form-group @if ($errors->has('direccion')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. Av. Alvaro Obregón #229 esq. Av. Independencia.">
             Dirección
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('direccion',null,['class' => 'form-control','id' => 'direccion']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('tel1')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. 01-624-145-6200 Ext. 31143">
            Teléfono
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('tel1',null,['class' => 'form-control','id' => 'tel1']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('horario')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. Lun-Vie: 08:00 AM - 07:00 PM">
            Horario
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('horario',null,['class' => 'form-control','id' => 'horario']) !!}
    </div>
</div><!-- /.form-group -->

<div class="form-group @if ($errors->has('colonia')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos 0-9!<>?.$%&">
           Colonia
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('colonia',null,['class' => 'form-control','id' => 'colonia']) !!}
    </div>
</div><!-- /.form-group -->

<div class="form-group @if ($errors->has('tel2')) has-error @endif">
    <label class="control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. 01-624-145-6200 Ext. 31143">
            Teléfono <small>(Opcional)</small>
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('tel2',null,['class' => 'form-control','id' => 'tel2']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('horario2')) has-error @endif">
    <label class="control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. Lun-Vie: 08:00 AM - 07:00 PM">
            Horario <small>(opcional)</small>
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('horario2',null,['class' => 'form-control','id' => 'horario2']) !!}
    </div>
</div><!-- /.form-group -->


<div class="form-group @if ($errors->has('cp')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos A-Z!<>?.$%&, maximo 5 digitos ">
            Código Postal
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('cp',null,['class' => 'form-control','id' => 'cp']) !!}
    </div>
</div><!-- /.form-group -->

<div class="form-group @if ($errors->has('tipo_locacion')) has-error @endif">
    <label class=" required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Aeropuerto o ciudad">
            Tipo de locación
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::select('tipo_locacion',$tipo,null,['class'=>'form-control']) !!}
    </div>
</div><!-- /.form-group -->
