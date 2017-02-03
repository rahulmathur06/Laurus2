<div class="form-group @if ($errors->has('pcode')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Código de producto">
             Código de producto
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('pcode',null,['class' => 'form-control','id' => 'pcode']) !!}
    </div>
</div><!-- /.form-group -->

<div class="form-group @if ($errors->has('web')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Seleccione un tipo de cobertura web o cualquiero otro tipo de convenio">
             Tipo de cobertura
         </span>
    </label>
    <div class="col-lg-8">
        {!! Form::select('web',$tipoCobertura,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','aria-hidden'=>'true','tabindex'=>'-1']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('pcodetarifa')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Adaptarlo al JR">
             Plan código tarifas
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('pcodetarifa',null,['class' => 'form-control','id' => 'pcodetarifa']) !!}
    </div>
</div><!-- /.form-group -->

<div class="form-group">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Seleccione los catálogos que ocupara la cobertura">
             Catátalogos
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::select('catalogo_id[]',$catalogos ,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','multiple','aria-hidden'=>'true','tabindex'=>'-1']) !!}
    </div>
</div>





