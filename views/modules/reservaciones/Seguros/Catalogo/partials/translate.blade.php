

<div class="form-group @if ($errors->has('nombre')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del nuevo catálogo (en español). Caracteres invalidos 0-9·$%&/()=?¿">
             Nombre
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('nombre',null,['class' => 'form-control','id' => 'nombre']) !!}
    </div>
    </div><!-- /.form-group -->
<div class="form-group"@if ($errors->has('descripcion')) has-error @endif>
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Descripción del nuevo catálogo (en español)">
             Descripción
         </span>
    </label><div class="col-lg-8">
    {!! Form::textarea('descripcion', null, ['style'=>'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
    </div>
</div>

