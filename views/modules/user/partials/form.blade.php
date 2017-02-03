<div class="form-group @if ($errors->has('image')) has-error @endif">
    {!! Form::label('image','Avatar',['class' =>'col-xs-2 control-label']) !!}

    <div class="col-xs-8">
        @if ($errors->has('image'))
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('image') }}</label>
        @endif
            @if(isset($users->id))
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px;">
                <img src="{{ url('img/users/'.$users->image) }}"></div>
            @endif

        {!! Form::file('image')!!}
    </div>
</div>

<div class="form-group @if ($errors->has('username')) has-error @endif">

    {!! Form::label('username','Usuario:',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        @if ($errors->has('username'))
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('username') }}</label>
        @endif
        {!! Form::text('username',null,['class' => 'form-control','placeholder' => 'Ingrese un usuario']) !!}
    </div>
</div>
<div class="form-group @if ($errors->has('first_name')) has-error @endif">

    {!! Form::label('first_name','Nombre',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        @if ($errors->has('first_name'))
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i> {{ $errors->first('first_name') }}</label>
        @endif
        {!! Form::text('first_name',null,['class' => 'form-control','placeholder' => 'Ingrese un nombre']) !!}
    </div>
</div>
<div class="form-group @if ($errors->has('last_name')) has-error @endif">
    {!! Form::label('last_name','Apellido',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        @if ($errors->has('last_name')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('last_name') }}</label>
        @endif
        {!! Form::text('last_name',null,['class' => 'form-control','placeholder' => 'Ingrese un apellido']) !!}
    </div>

</div>

<div class="form-group @if ($errors->has('fecha_nacimiento')) has-error @endif">
    {!! Form::label('fecha_nacimiento','Fecha de nacimiento:',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        @if ($errors->has('fecha_nacimiento')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('fecha_nacimiento') }}</label>
        @endif
        {!! Form::text('fecha_nacimiento',null,['class' => 'form-control datepicker','placeholder' => 'Ingrese la fecha de nacimiento', 'id'=>'fecha_nacimiento', 'name'=>'fecha_nacimiento']) !!}
    </div>

</div>
<div class="form-group @if ($errors->has('position')) has-error @endif">
    {!! Form::label('position','Puesto',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-12 col-md-8">
        @if ($errors->has('position')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('position') }}</label>
        @endif
        {!! Form::text('position',null,['class' => 'form-control','placeholder' => 'Ingrese un puesto']) !!}
    </div>

</div>
<div class="form-group @if ($errors->has('telefono')) has-error @endif">
    {!! Form::label('telefono','Telefono:',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-12 col-md-8">
        @if ($errors->has('telefono')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('telefono') }}</label>
        @endif
        {!! Form::text('telefono',null,['class' => 'form-control','placeholder' => 'Ingrese un telefono']) !!}
    </div>

</div>
<div class="form-group @if ($errors->has('extension')) has-error @endif">
    {!! Form::label('extension','Extension:',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-12 col-md-8">
        @if ($errors->has('extension')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('extension') }}</label>
        @endif
        {!! Form::text('extension',null,['class' => 'form-control','placeholder' => 'Ingrese una extension']) !!}
    </div>

</div>

<div class="form-group @if ($errors->has('fecha_ingreso')) has-error @endif">
    {!! Form::label('fecha_ingreso','Fecha de ingreso:',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        @if ($errors->has('fecha_ingreso')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('fecha_ingreso') }}</label>
        @endif
        {!! Form::text('fecha_ingreso',null,['class' => 'form-control datepicker','placeholder' => 'Ingrese la fecha de ingreso', 'id'=>'fecha_ingreso', 'name'=>'fecha_ingreso']) !!}
    </div>

</div>
<div class="form-group @if ($errors->has('email')) has-error @endif">
    {!! Form::label('email','Correo eléctronico',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        @if ($errors->has('email')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('email') }}</label>
        @endif
        {!! Form::email('email',null,['class' => 'form-control','placeholder' => 'example@dominio.com']) !!}
    </div>

</div>
@if(!isset($users->id))
    <div class="form-group @if ($errors->has('password')) has-error @endif">
        {!! Form::label('password','Contraseña',['class' =>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            @if ($errors->has('password')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                {{ $errors->first('password') }}</label>
            @endif
            {!! Form::password('password',['class' => 'form-control','placeholder' => 'Contraseña temporal']) !!}
        </div>

    </div>

    <div class="form-group @if ($errors->has('retype_password')) has-error @endif">
        {!! Form::label('password','Repetir contraseña',['class' =>'col-xs-2 control-label']) !!}
        <div class="col-xs-8">
            @if ($errors->has('retype_password')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
                {{ $errors->first('retype_password') }}</label>
            @endif
            {!! Form::password('retype_password',['class' => 'form-control','placeholder' => 'Repetir contraseña temporal']) !!}
        </div>

    </div>
@endif
<div class="form-group @if ($errors->has('roles')) has-error @endif">
    {!! Form::label('roles','Rol',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-8">
        @if ($errors->has('roles')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('roles') }}</label>
        @endif
            @if(isset($users->id))
                {!! Form::select('roles',$roles, $rolUser[0]->slug,['class' => 'form-control'] ) !!}
            @else
                {!! Form::select('roles',$roles, null,['class' => 'form-control'] ) !!}
            @endif
    </div>

</div>
<div class="form-group @if ($errors->has('plaza_matriz')) has-error @endif">
    {!! Form::label('plaza_matriz','Plaza matriz',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-12 col-md-8">
        @if ($errors->has('plaza_matriz')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('plaza_matriz') }}</label>
        @endif
            @if(isset($users->id))
                {!! Form::select('plaza_matriz_id', $plazas_select, $users->plaza_matriz_id,['class' => 'form-control'] ) !!}
            @else
                {!! Form::select('plaza_matriz_id', $plazas_select, null,['class' => 'form-control'] ) !!}
            @endif
    </div>

</div>

<div class="form-group @if ($errors->has('jefe_directo')) has-error @endif">
    {!! Form::label('jefe_directo','Jefe directo:',['class' =>'col-xs-2 control-label']) !!}
    <div class="col-xs-12 col-md-8">
        @if ($errors->has('jefe_directo')) <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
            {{ $errors->first('jefe_directo') }}</label>
        @endif
                {!! Form::select('jefe_directo', $jefe_directo, null,['class' => 'form-control'] ) !!}

    </div>

</div>

<div class="form-group @if ($errors->has('plazas')) has-error @endif">
	{!! Form::label('plazas','Plazas',['class' =>'col-xs-2 control-label']) !!}
	<div class="col-xs-12 col-md-8">
		@foreach($place_user as $plaza)
		    <div class="col-xs-12 col-md-4">
		        @if ($errors->has('plazas'))
		        	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
					{{ $errors->first('plazas') }}</label>
		        @endif
		        {!! Form::checkbox('plazas[]', $plaza->Clave, true) !!} {!! $plaza->Nombre!!}
		    </div>
		@endforeach

		@foreach($plazas as $plaza)
		    <div class="col-xs-12 col-md-4">
		        @if ($errors->has('plazas'))
		        	<label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>
					{{ $errors->first('plazas') }}</label>
		        @endif
		        {!! Form::checkbox('plazas[]', $plaza->Clave) !!} {!! $plaza->Nombre!!}
		    </div>
		@endforeach
	</div>
</div>


