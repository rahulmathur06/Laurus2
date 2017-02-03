
<div class="form-group @if ($errors->has('estado_id')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos 0-9·$%&%">
            Estado
         </span>
    </label>
    <div class="col-xs-8">
        {!! Form::select('estado_id',$estados,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%']) !!}
    </div>
</div>
<!-- /.form-group  -->

<div class="form-group @if ($errors->has('nombre')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos 0-9·$%&%">
             Nombre
         </span>
    </label>
    <div class="col-xs-8">
        {!! Form::text('nombre',null,['class' => 'form-control','id' => 'nombre']) !!}
    </div>
    <!-- /.col  -->
</div>
<!-- /.form-group -->

<div class="form-group @if ($errors->has('orden')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos a-z·$%&/()=?¿, ordenamiento">
             Orden
         </span>
    </label>
    <div class="col-xs-8">
        {!! Form::text('orden',null,['class' => 'form-control','placeholder'=>'10']) !!}
    </div>
    <!-- /.col  -->
</div>