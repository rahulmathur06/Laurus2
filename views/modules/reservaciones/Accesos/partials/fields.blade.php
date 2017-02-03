<div class="form-group @if ($errors->has('activo')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Activar acceso">
            Activo
         </span>
    </label>
    <div class="col-xs-8">
        {!! Form::select('activo',['1' => 'Si', '0' => 'No'],null,['class'=>'form-control']) !!}
    </div>
</div>
<!-- /.form-group -->
<div class="form-group @if ($errors->has('id_convenio')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Convenio">
             Convenio
         </span>
    </label>
    <div class="col-xs-8">
        {!! Form::select('id_convenio',$convenios,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%']) !!}
    </div>
</div>
<!-- /.form-group  -->
<div class="form-group @if ($errors->has('ip')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Dirección ip">
             IP
         </span>
    </label>
    <div class="col-xs-8">
        {!! Form::text('ip',null,['class' => 'form-control','data-inputmask'=>'"alias": "ip"','data-mask'=>""]) !!}

    </div>
</div>
<!-- /.form-group -->
<div class="form-group @if ($errors->has('usuario')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="El usuario debe de ser unico y sin espacios">
             Usuario
         </span>
    </label>
    <div class="col-xs-8">
        {!! Form::text('usuario',null,['class' => 'form-control']) !!}
    </div>
    <!-- /.col  -->
</div>
<!-- /.form-group -->

<div class="form-group @if ($errors->has('password')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="La contraseña debe de ser sin espacios">
             Contraseña
         </span>
    </label>

    <div class="col-xs-8">
        {!! Form::password('password',['class' => 'form-control']) !!}
    </div>
</div>




