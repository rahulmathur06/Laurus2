<div class="form-group @if ($errors->has('mensaje')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Descripción del destino (español)">
             Descripción
         </span>
    </label>
    <div class="col-md-8">
        <div class="form-group">
            {!! Form::textarea('mensaje', null, ['style'=>'width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
        </div>
    </div>
</div>