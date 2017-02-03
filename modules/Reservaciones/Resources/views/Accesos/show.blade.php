@extends('layout.master')
@section('content-header')
    <h1><i class="fa fa-key"></i> Accesos <small>Usuario {{$acceso->usuario}}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('acceso')}}">Accesos</a></li>
        <li class="active">Ver</li>
    </ol>
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-body">
            <div class="form-group">
                {!! Form::label('activo','Activo ',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('usuario',$acceso->activo,['class' => 'form-control','disabled']) !!}
                </div>
            </div>
            <br>   <br>
            <!-- /.form-group -->
            <div class="form-group">
                {!! Form::label('id_convenio','Convenio ',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('usuario',$acceso->convenio->nombre,['class' => 'form-control','disabled']) !!}
                </div>
            </div>   <br>   <br>
            <!-- /.form-group  -->
            <div class="form-group">
                {!! Form::label('ip','Ip ',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('usuario',$acceso->ip,['class' => 'form-control','disabled']) !!}
                </div>
            </div>   <br>   <br>
            <!-- /.form-group -->
            <div class="form-group">
                {!! Form::label('usuario','Usuario ',['class' =>'col-xs-2 control-label']) !!}
                <div class="col-xs-10">
                    {!! Form::text('usuario',$acceso->usuario,['class' => 'form-control','disabled']) !!}
                </div>
                <!-- /.col  -->
            </div>
            <!-- /.form-group -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <a href="{{route('acceso.edit',$acceso->id)}}" class="btn btn-primary " title="Editar "
                            ><i class="fa fa-pencil"></i> Editar</a>
                    <a href="{{url('acceso')}}" class="btn btn-default" ><i class="fa fa-mail-reply"></i> Regresar</a>
                </div>
            </div>
        </div>

    </div>
@endsection

