<div class="form-group @if ($errors->has('clave')) has-error @endif">
	{!! Form::label('clave', 'Clave:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('clave', null, ['class' =>'form-control', 'placeholder' => 'Ingrese un numero de clave']) !!}
		@if ($errors->has('clave'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('clave') }}</label>
		@endif
	</div>
</div>
<!--<div class="form-group @if ($errors->has('descripcion')) has-error @endif">
	{!! Form::label('descripcion', 'Descripción:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('descripcion', null, ['class' =>'form-control', 'placeholder' => 'Ingrese la descripcion']) !!}
		@if ($errors->has('descripcion'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('descripcion') }}</label>
		@endif
	</div>
</div>-->
<div class="form-group @if ($errors->has('grupo')) has-error @endif">
	{!! Form::label('grupo', 'Grupo:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('grupo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el grupo']) !!}
		@if ($errors->has('grupo'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('grupo') }}</label>
		@endif		
	</div>
</div>
<div class="form-group @if ($errors->has('status')) has-error @endif">
    
    <div class="col-xs-12 col-md-8">
        @if ($errors->has('status')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('status') }}</label>
        @endif
		
		{!! Form::hidden('status', '92') !!}


    </div>

</div>
<div class="form-group @if ($errors->has('plaza_contable')) has-error @endif">
	{!! Form::label('plaza_contable', 'Plaza Contable:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		<!--{!! Form::text('plaza_contable', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la plaza contable']) !!}-->
		{!! Form::select('plaza_contable', $site, null,['class' => 'form-control','placeholder' => 'Seleccione plaza contable'] ) !!}
		@if ($errors->has('plaza_contable'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('plaza_contable') }}</label>
		@endif
	</div>
</div>
<div class="form-group @if ($errors->has('plaza')) has-error @endif">
	{!! Form::label('plaza', 'Plaza:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		<!--{!! Form::text('plaza', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la plaza']) !!}-->
		{!! Form::select('plaza', $site, null,['class' => 'form-control','placeholder' => 'Seleccione plaza'] ) !!}
		@if ($errors->has('plaza'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('plaza') }}</label>
		@endif
	</div>
</div>
<div class="form-group @if ($errors->has('tipo')) has-error @endif">
	{!! Form::label('tipo', 'Tipo:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('tipo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el tipo']) !!}
		@if ($errors->has('tipo'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('tipo') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('fvenc_placas')) has-error @endif">
    {!! Form::label('fvenc_placas','Fecha de vencimiento placas:',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        @if ($errors->has('fvenc_placas')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('fvenc_placas') }}</label>
        @endif
        {!! Form::text('fvenc_placas',null,['class' => 'form-control datepicker','placeholder' => 'Ingrese la fecha de vencimiento', 'id'=>'fvenc_placas', 'name'=>'fvenc_placas']) !!}
    </div>
</div>

<div class="form-group @if ($errors->has('fvenc_verif')) has-error @endif">
    {!! Form::label('fvenc_verif','Fecha de vencimiento verif:',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        @if ($errors->has('fvenc_verif')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('fvenc_verif') }}</label>
        @endif
        {!! Form::text('fvenc_verif',null,['class' => 'form-control datepicker','placeholder' => 'Ingrese la fecha de vencimiento', 'id'=>'fvenc_verif', 'name'=>'fvenc_verif']) !!}
    </div>
</div>

<div class="form-group @if ($errors->has('clave_int')) has-error @endif">
	{!! Form::label('clave_int', 'Sipp code:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('clave_int', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el sipp code']) !!}
		@if ($errors->has('clave_int'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('clave_int') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('ano')) has-error @endif">
    {!! Form::label('ano','Año:',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        @if ($errors->has('ano')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('ano') }}</label>
        @endif
        {!! Form::text('ano',null,['class' => 'form-control datepicker','placeholder' => 'Ingrese el año', 'id'=>'ano', 'name'=>'ano']) !!}
    </div>

</div>

<div class="form-group @if ($errors->has('marca')) has-error @endif">
	{!! Form::label('marca', 'Marca:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('marca', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la marca']) !!}
		@if ($errors->has('marca'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('marca') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('color')) has-error @endif">
	{!! Form::label('color', 'Color:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('color', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el color']) !!}
		@if ($errors->has('color'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('color') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('no_puertas')) has-error @endif">
	{!! Form::label('no_puertas', 'No. puertas:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('no_puertas', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el número de puertas']) !!}
		@if ($errors->has('no_puertas'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('no_puertas') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('transmision')) has-error @endif">
	{!! Form::label('transmision', 'Transmision:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		<!--{!! Form::text('transmision', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la transmision']) !!}-->
		{!! Form::select('transmision', config('options.types'), null,['class' => 'form-control'] ) !!}
		<!--{!! Form::select('transmision', ['Automatica','Manual'], null,['class' => 'form-control','placeholder' => 'Seleccione transmision'] ) !!}-->
		@if ($errors->has('transmision'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('transmision') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('pasajeros')) has-error @endif">
	{!! Form::label('pasajeros', 'Pasajeros:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('pasajeros', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de pasajeros']) !!}
		@if ($errors->has('pasajeros'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('pasajeros') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('capacidad_gas')) has-error @endif">
	{!! Form::label('capacidad_gas', 'Capacidad tanque de gasolina:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('capacidad_gas', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la capacidad de gasolina en litros']) !!}
		@if ($errors->has('capacidad_gas'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('capacidad_gas') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('cia_seguros')) has-error @endif">
	{!! Form::label('cia_seguros', 'Compañia de seguros:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		<!--{!! Form::text('cia_seguros', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la compañia de seguros']) !!}-->
		{!! Form::select('cia_seguros',config('cia_seguros.seguros'), null,['class' => 'form-control'] ) !!}
		@if ($errors->has('cia_seguros'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('cia_seguros') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('serie')) has-error @endif">
	{!! Form::label('serie', 'Serie:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('serie', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la serie']) !!}
		@if ($errors->has('serie'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('serie') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('motor')) has-error @endif">
	{!! Form::label('motor', 'Motor:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('motor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el no motor']) !!}
		@if ($errors->has('motor'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('motor') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('placas')) has-error @endif">
	{!! Form::label('placas', 'Placas:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('placas', null, ['class' => 'form-control', 'placeholder' => 'Ingrese las placas']) !!}
		@if ($errors->has('placas'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('placas') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('km_servicio')) has-error @endif">
	{!! Form::label('km_servicio', 'Km de servicio:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('km_servicio', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el km de servicio']) !!}
		@if ($errors->has('km_servicio'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('km_servicio') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('fecha_compra')) has-error @endif">
    {!! Form::label('fecha_compra','Fecha de compra:',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        @if ($errors->has('fecha_compra')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('fecha_compra') }}</label>
        @endif
        {!! Form::text('fecha_compra',null,['class' => 'form-control datepicker','placeholder' => 'Ingrese la fecha de compra', 'id'=>'fecha_compra', 'name'=>'fecha_compra']) !!}
    </div>
</div>

<div class="form-group @if ($errors->has('costo_iva')) has-error @endif">
	{!! Form::label('costo_iva', 'Costo con Iva:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('costo_iva', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el costo con iva']) !!}
		@if ($errors->has('costo_iva'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('costo_iva') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('no_factura')) has-error @endif">
	{!! Form::label('no_factura', 'Numero de factura:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('no_factura', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el numero de factura']) !!}
		@if ($errors->has('no_factura'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('no_factura') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('proveedor')) has-error @endif">
	{!! Form::label('proveedor', 'Proveedor:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('proveedor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el proveedor']) !!}
		@if ($errors->has('proveedor'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('proveedor') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('fleet_type')) has-error @endif">
	{!! Form::label('fleet_type', 'Uso(renta, contraprestacion, administracion,venta):', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('fleet_type', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el uso']) !!}
		@if ($errors->has('fleet_type'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('fleet_type') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('nota_fleet_type')) has-error @endif">
	{!! Form::label('nota_fleet_type', 'Nota de uso:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('nota_fleet_type', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la nota de uso']) !!}
		@if ($errors->has('nota_fleet_type'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('nota_fleet_type') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('tenencia_ano')) has-error @endif">
    {!! Form::label('tenencia_ano','Tenencia Año:',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        @if ($errors->has('tenencia_ano')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('tenencia_ano') }}</label>
        @endif
        {!! Form::text('tenencia_ano',null,['class' => 'form-control datepicker','placeholder' => 'Ingrese la fecha de la tenencia', 'id'=>'tenencia_ano', 'name'=>'tenencia_ano']) !!}
    </div>
</div>

<div class="form-group @if ($errors->has('tenencia_importe')) has-error @endif">
	{!! Form::label('tenencia_importe', 'Tenencia importe:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('tenencia_importe', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el importe de la tenencia']) !!}
		@if ($errors->has('tenencia_importe'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('tenencia_importe') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('modelo')) has-error @endif">
	{!! Form::label('modelo', 'Modelo:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('modelo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el modelo']) !!}
		@if ($errors->has('modelo'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('modelo') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('gas')) has-error @endif">
	{!! Form::label('gas', 'Gas:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('gas', null, ['class' => 'form-control', 'placeholder' => 'gas']) !!}
		@if ($errors->has('gas'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('gas') }}</label>
		@endif
	</div>
</div>
<div class="form-group @if ($errors->has('km')) has-error @endif">
	{!! Form::label('km', 'KM:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('km', null, ['class' => 'form-control', 'placeholder' => 'km']) !!}
		@if ($errors->has('km'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('km') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('deduciblematerial')) has-error @endif">
	{!! Form::label('deduciblematerial', 'Deducible material:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('deduciblematerial', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el deducible']) !!}
		@if ($errors->has('deduciblematerial'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('deduciblematerial') }}</label>
		@endif
	</div>
</div>
<div class="form-group @if ($errors->has('deduciblerobo')) has-error @endif">
	{!! Form::label('deduciblerobo', 'Deducible robo:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('deduciblerobo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el deducible']) !!}
		@if ($errors->has('deduciblerobo'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('deduciblerobo') }}</label>
		@endif
	</div>
</div>

<div class="form-group @if ($errors->has('activo')) has-error @endif">
    {!! Form::label('activo','Estatus de activo:',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-12 col-md-8">
        @if ($errors->has('activo')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('activo') }}</label>
        @endif
                {!! Form::select('activo', $estatus, null,['class' => 'form-control'] ) !!}

    </div>

</div>

<!--<div class="form-group @if ($errors->has('fvenc_placas')) has-error @endif">
    <div class="col-xs-12 col-md-8">
        @if ($errors->has('fvenc_placas')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('fvenc_placas') }}</label>
        @endif
		{!! Form::hidden('fvenc_placas', null) !!}
    </div>
</div>
<div class="form-group @if ($errors->has('fvenc_verif')) has-error @endif">
    <div class="col-xs-12 col-md-8">
        @if ($errors->has('fvenc_verif')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('fvenc_verif') }}</label>
        @endif
		{!! Form::hidden('fvenc_verif', null) !!}
    </div>
</div>-->

<div class="form-group @if ($errors->has('in_service')) has-error @endif">
    <div class="col-xs-12 col-md-8">
        @if ($errors->has('in_service')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('in_service') }}</label>
        @endif
		{!! Form::hidden('in_service', null) !!}
    </div>
</div>
<div class="form-group @if ($errors->has('fecha_um')) has-error @endif">
    <div class="col-xs-12 col-md-8">
        @if ($errors->has('fecha_um')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('fecha_um') }}</label>
        @endif
		{!! Form::hidden('fecha_um', null) !!}
    </div>
</div>
<div class="form-group @if ($errors->has('fecha_envio')) has-error @endif">
    <div class="col-xs-12 col-md-8">
        @if ($errors->has('fecha_envio')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('fecha_envio') }}</label>
        @endif
		{!! Form::hidden('fecha_envio', null) !!}
    </div>
</div>
