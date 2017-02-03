<div class="form-group @if ($errors->has('clave')) has-error @endif">
	{!! Form::label('clave', 'Clave:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('clave', null, ['class' =>'form-control', 'placeholder' => 'Ingrese un numero']) !!}
		@if ($errors->has('clave'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('clave') }}</label>
		@endif
	</div>
</div>
<div class="form-group @if ($errors->has('grupo')) has-error @endif">
	{!! Form::label('grupo', 'Grupo:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('grupo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el grupo']) !!}
		@if ($errors->has('grupo'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('grupo') }}</label>
		@endif		
	</div>
</div>
<div class="form-group @if ($errors->has('cia_seguros')) has-error @endif">
	{!! Form::label('cia_seguros', 'Compania de seguros:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('cia_seguros', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la compañia de seguros']) !!}
		@if ($errors->has('cia_seguros'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('cia_seguros') }}</label>
		@endif
	</div>
</div>
<div class="form-group @if ($errors->has('clave_int')) has-error @endif">
	{!! Form::label('clave_int', 'Clave int:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('clave_int', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la clave interior']) !!}
		@if ($errors->has('clave_int'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('clave_int') }}</label>
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
<div class="form-group @if ($errors->has('modelo')) has-error @endif">
	{!! Form::label('modelo', 'Modelo:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('modelo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el modelo']) !!}
		@if ($errors->has('modelo'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('modelo') }}</label>
		@endif
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
<div class="form-group @if ($errors->has('serie')) has-error @endif">
	{!! Form::label('serie', 'Serie:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('serie', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la serie']) !!}
		@if ($errors->has('serie'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('serie') }}</label>
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
<div class="form-group @if ($errors->has('plaza_contable')) has-error @endif">
	{!! Form::label('plaza_contable', 'Plaza Contable:', ['class' => 'col-md-2 control-label']) !!}
	<div class="col-xs-8">
		{!! Form::text('plaza_contable', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la plaza contable']) !!}
		@if ($errors->has('plaza_contable'))
	    	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('plaza_contable') }}</label>
		@endif
	</div>
</div>