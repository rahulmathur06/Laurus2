@if(!isset($restriccion))
<div class="form-group @if ($errors->has('locacion_id')) has-error @endif">
    {!! Form::label('locacion_id','Locación *',['class' =>'col-lg-2 control-label']) !!}
    <div class="col-lg-8 ">
    {!! Form::select('locacion_id',$locaciones,null,['class'=>'form-control select2 select2-hidden-accessible ','style'=>'width :100%']) !!}
    </div>
</div><!-- /.form-group -->
@else
    {!! Form::hidden('locacion_id',$restriccion->locacion_id,['class' => 'form-control','id' => 'locacion_id']) !!}
@endif
<div class="form-group @if ($errors->has('openMonday')|| $errors->has('closeMonday') ) has-error @endif">
    {!! Form::label('lunes','Lunes',['class' =>'col-lg-2 control-label ']) !!}
    <div class="col-lg-4 ">
    {!! Form::text('openMonday',null,['class' => 'form-control timepicker','id' => 'lunes']) !!}
    </div>
    <div class="col-lg-4">
        {!! Form::text('closeMonday',null,['class' => 'form-control timepicker','id' => 'lunes2']) !!}
    </div>
</div><!-- /.form-group -->

<div class="form-group @if ($errors->has('openTuesday')|| $errors->has('closeTuesday') ) has-error @endif">
    {!! Form::label('martes','Martes',['class' =>'col-lg-2 control-label']) !!}
    <div class="col-lg-4">
        {!! Form::text('openTuesday',null,['class' => 'form-control timepicker','id' => 'martes']) !!}
    </div>
    <div class="col-lg-4">
        {!! Form::text('closeTuesday',null,['class' => 'form-control timepicker','id' => 'martes2']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('openWednesday')|| $errors->has('closeWednesday') ) has-error @endif">
    {!! Form::label('miercoles','Miercoles',['class' =>'col-lg-2 control-label']) !!}
    <div class="col-lg-4">
        {!! Form::text('openWednesday',null,['class' => 'form-control timepicker','id' => 'miercoles']) !!}
    </div>
    <div class="col-lg-4">
        {!! Form::text('closeWednesday',null,['class' => 'form-control timepicker','id' => 'miercoles2']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('openThursday')|| $errors->has('closeThursday') ) has-error @endif">
    {!! Form::label('jueves','Jueves',['class' =>'col-lg-2 control-label']) !!}
    <div class="col-lg-4">
        {!! Form::text('openThursday',null,['class' => 'form-control timepicker','id' => 'jueves']) !!}
    </div>
    <div class="col-lg-4">
        {!! Form::text('closeThursday',null,['class' => 'form-control timepicker','id' => 'jueves2']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('openFriday')|| $errors->has('closeFriday') ) has-error @endif">
    {!! Form::label('viernes','Viernes',['class' =>'col-lg-2 control-label']) !!}
    <div class="col-lg-4">
        {!! Form::text('openFriday',null,['class' => 'form-control timepicker','id' => 'viernes']) !!}
    </div>
    <div class="col-lg-4">
        {!! Form::text('closeFriday',null,['class' => 'form-control timepicker','id' => 'viernes2']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('openSaturday')|| $errors->has('closeSaturday') ) has-error @endif">
    {!! Form::label('sabado','Sabado',['class' =>'col-lg-2 control-label']) !!}
    <div class="col-lg-4">
        {!! Form::text('openSaturday',null,['class' => 'form-control timepicker','id' => 'sabado']) !!}
    </div>
    <div class="col-lg-4">
        {!! Form::text('closeSaturday',null,['class' => 'form-control timepicker','id' => 'sabado2']) !!}
    </div>
</div><!-- /.form-group -->
<div class="form-group @if ($errors->has('openSunday')|| $errors->has('closeSunday') ) has-error @endif">
    {!! Form::label('domingo','Domingo',['class' =>'col-lg-2 control-label']) !!}
    <div class="col-lg-4">
        {!! Form::text('openSunday',null,['class' => 'form-control timepicker','id' => 'domingo']) !!}
    </div>
    <div class="col-lg-4">
        {!! Form::text('closeSunday',null,['class' => 'form-control timepicker','id' => 'domingo2']) !!}
    </div>
</div><!-- /.form-group -->
