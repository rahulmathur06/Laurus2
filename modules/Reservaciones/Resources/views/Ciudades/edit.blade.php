@extends('layout.master')
@section('css')
  <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-plane"></i> Locaciones<small>Actualizar ciudad</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('ciudad')}}">Locaciones</a></li>
        <li><a href="{{url('ciudad')}}">Ciudades</a></li>
        <li class="active">Actualizar</li>
    </ol>
@endsection
@section('content')
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">Actualizar Ciudad</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            {!! Form::model($ciudad,['route' => ['ciudad.update', $ciudad->id],'method'=>'PUT','id'=>'form_ciudad','parsley-validate novalidate','class'=>'form-horizontal']  ) !!}
            @include('reservaciones::Ciudades.partials.fields')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
                    <a href="{{url('ciudad')}}" class="btn btn-default" >Cancelar</a>
                </div>
            </div>
        </div>
        <!-- /.box-footer -->
        {!! Form::close() !!}
    </div>
@endsection
@section('scripts')

  <script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
    <script>
        $(function () {

            $(".select2").select2();

        });
    </script>

@endsection
