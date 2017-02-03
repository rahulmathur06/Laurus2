@extends('layout.master')
@section('content-header')
    <h1><i class="fa fa-plane"></i> Locaciones<small>Ciudad {{$ciudad->nombre}}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('ciudad')}}">Locaciones</a></li>
        <li><a href="{{url('ciudad')}}">Ciudades</a></li>
        <li class="active">Ver</li>
    </ol>
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('estado','Estado',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('estado',$ciudad->estado->nombre,['class' => 'form-control','disabled']) !!}
                </div>
            </div>
            <br>   <br>
            <!-- /.form-group -->
            <div class="form-group">
                {!! Form::label('nombre','Nombre',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('nombre',$ciudad->nombre,['class' => 'form-control','disabled']) !!}
                </div>
            </div>   <br>   <br>
            <!-- /.form-group  -->
            <div class="form-group">
                {!! Form::label('acron','Acronimo',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('acron',$ciudad->acron,['class' => 'form-control','disabled']) !!}
                </div>
            </div>   <br>   <br>
            <!-- /.form-group  -->

            <div class="form-group">
                {!! Form::label('aip','Aip',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('aip',$ciudad->aip,['class' => 'form-control','disabled']) !!}
                </div>
            </div>   <br>   <br>
            <!-- /.form-group  -->

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <a href="{{route('ciudad.edit',$ciudad->id)}}" class="btn btn-primary " title="Editar"
                            ><i class="fa fa-pencil"></i> Editar</a>
                    <a href="{{url('ciudad')}}" class="btn btn-danger" ><i class="fa fa-mail-reply"></i> Regresar</a>
                </div>
            </div>
        </div>

    </div>
@endsection

