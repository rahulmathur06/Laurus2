@extends('layout.master')
@section('content-header')
    <h1><i class="fa fa-book"></i> Convenios <small>Convenio {{$convenio->nombre}}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('convenio')}}">Convenios</a></li>
        <li class="active">Ver</li>
    </ol>
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('activo','Activo ',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('activo',$convenio->activo,['class' => 'form-control','disabled']) !!}
                </div>
            </div>
            <br>   <br>
            <!-- /.form-group -->
            <div class="form-group">
                {!! Form::label('nombre','Convenio ',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('nombre',$convenio->nombre,['class' => 'form-control','disabled']) !!}
                </div>
            </div>   <br>   <br>
            <!-- /.form-group  -->
            <div class="form-group">
                {!! Form::label('acronimo','Acronimo',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('acronimo',$convenio->acronimo,['class' => 'form-control','disabled']) !!}
                </div>
            </div>   <br>   <br>
            <!-- /.form-group -->
            <div class="form-group">
                {!! Form::label('idioma','Idioma',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('idioma',$convenio->idioma,['class' => 'form-control','disabled']) !!}
                </div>
                <!-- /.col  -->
            </div><br>   <br>
            <!-- /.form-group -->

            <div class="form-group">
                {!! Form::label('moneda','Moneda',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('moneda',$convenio->moneda,['class' => 'form-control','disabled']) !!}
                </div>
                <!-- /.col  -->
            </div><br>   <br>
            <!-- /.form-group -->


            <div class="form-group">
                {!! Form::label('horas_tolerancia','Horas de tolerancia',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('horas_tolerancia',$convenio->horas_tolerancia,['class' => 'form-control','disabled']) !!}
                </div>
                <!-- /.col  -->
            </div><br>   <br>
            <!-- /.form-group -->

            <div class="form-group">
                {!! Form::label('dias_semana','Días de la semana',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('dias_semana',$convenio->dias_semana,['class' => 'form-control','disabled']) !!}
                </div>
                <!-- /.col  -->
            </div><br>   <br>
            <!-- /.form-group -->
            <div class="form-group">
                {!! Form::label('dias_mes','Días de mes',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('dias_mes',$convenio->dias_mes,['class' => 'form-control','disabled']) !!}
                </div>
                <!-- /.col  -->
            </div><br>   <br>
            <!-- /.form-group -->
            <div class="form-group">
                {!! Form::label('tipo','Tipo',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('tipo',$convenio->tipo,['class' => 'form-control','disabled']) !!}
                </div>
                <!-- /.col  -->
            </div><br>   <br>
            <!-- /.form-group -->
            <div class="form-group">
                {!! Form::label('prepago_habilitado','Prepago habilitado',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('prepago_habilitado',$convenio->prepago_habilitado,['class' => 'form-control','disabled']) !!}
                </div>
                <!-- /.col  -->
            </div><br>   <br>
            <!-- /.form-group -->
            <div class="form-group">
                {!! Form::label('descuento_ppgo_habilitado','Descuento de prepago habilitado',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('descuento_ppgo_habilitado',$convenio->descuento_ppgo_habilitado,['class' => 'form-control','disabled']) !!}
                </div>
                <!-- /.col  -->
            </div><br>   <br>
            <!-- /.form-group -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <a href="{{route('convenio.edit',$convenio->id)}}" class="btn btn-primary " title="Editar "
                            ><i class="fa fa-pencil"></i> Editar</a>
                    <a href="{{url('convenio')}}" class="btn btn-danger" ><i class="fa fa-mail-reply"></i> Regresar</a>
                </div>
            </div>
        </div>

    </div>
@endsection

