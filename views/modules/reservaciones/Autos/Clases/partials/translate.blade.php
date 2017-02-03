<div class="form-group @if ($errors->has('nombre')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre de la clase de auto en español. Caracteres invalidos 0-9!·$%&/()=?">
             Nombre
         </span>
    </label>
    <div class="col-lg-8">
        {!! Form::text('nombre',null,['class' => 'form-control','id' => 'nombre']) !!}
    </div>
</div><!-- /.form-group -->

<div class="form-group @if ($errors->has('descripcion')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Descripción de la clase en español.">
             Descripción
         </span>
    </label>
    <div class="col-lg-8">
        {!! Form::textarea('descripcion', null, ['class'=>'form-control','rows'=>'5','style'=>'resize:none']) !!}
    </div>
</div><!-- /.form-group -->
