<div class="form-group @if ($errors->has('latitud')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. 25.780571">
             Latitud
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('latitud',null,['class' => 'form-control','id' => 'latitud']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('longitud')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. -100.780571">
             Longitud
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('longitud',null,['class' => 'form-control','id' => 'longitud']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('zoom')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Google Maps tienen un nivel de zoom, niveles de escala entre 0 y 23">
             Zoom
         </span>
    </label>
    <div class="col-lg-8">
        {!! Form::text('zoom',null,['class' => 'form-control','id' => 'zoom']) !!}
    </div>
</div><!-- /.form-group -->


<div class="form-group @if ($errors->has('centro_latitud')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. 25.780571">
             Centro Latitud
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('centro_latitud',null,['class' => 'form-control','id' => 'centro_latitud']) !!}
    </div>
</div><!-- /.form-group -->


<div class="form-group @if ($errors->has('centro_longitud')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. -100.780571">
             Centro Longitud
         </span>
    </label>
    <div class="col-lg-8">
    {!! Form::text('centro_longitud',null,['class' => 'form-control','id' => 'centro_longitud']) !!}
    </div>
</div><!-- /.form-group -->

<div class="form-group @if ($errors->has('direccion_google_maps')) has-error @endif">
    <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ingresar una url de google  maps valida">
           Dirección Google Maps <small>(url)</small>
         </span>
    </label> <div class="col-lg-8">
    {!! Form::text('direccion_google_maps',null,['class' => 'form-control','id' => 'direccion_google_maps']) !!}
    </div>
</div><!-- /.form-group -->
