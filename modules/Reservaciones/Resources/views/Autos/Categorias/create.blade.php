@extends('layout.master')
@section('css')
@endsection
@section('content-header')
    <h1><i class="fa fa-car"></i> Autos <small>Nueva categoria</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('categorias')}}">Autos</a></li>
        <li><a href="{{url('categorias')}}">Categorias</a></li>
        <li class="active">Nueva</li>
    </ol>
@endsection
@section('content')
  @include('errors.errors')
    <div class="box box-success">
        <div class="box-body">
            {!! Form::open(['route' => 'categorias.store','method'=>'POST','id'=>'form_categoria','parsley-validate novalidate','class'=> 'form-horizontal']) !!}
            @include('reservaciones::Autos.Categorias.partials.translate')
            <input type="hidden" value="es-MX" name="idioma">
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{url('categorias')}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
                </div>
            </div>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')
@endsection
