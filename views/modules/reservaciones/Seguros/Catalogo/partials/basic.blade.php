<div class="form-group @if ($errors->has('clave')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Clave del nuevo catálogo. Caracteres invalidos 0-9·$%&/()=?¿">
             Clave
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('clave',null,['class' => 'form-control','id' => 'clave']) !!}
    </div>
</div><!-- /.form-group -->


