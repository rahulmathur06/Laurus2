@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-car"></i> Autos <small>Actualizar Flotilla</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('flotilla')}}">Autos</a></li>
        <li><a href="{{url('flotilla')}}">Flotilla</a></li>
        <li class="active">Actualizar</li>
    </ol>
@endsection
@section('content')
    <div class="box box-success">
        <div class="box-body">
            {!! Form::model($flotilla,['route' => ['flotilla.update', $flotilla->id],'method'=>'PUT','id'=>'form_flotilla','files'=>'true','parsley-validate novalidate']  ) !!}
            @include('reservaciones::Autos.Flotilla.partials.basic')
            @include('reservaciones::Autos.Flotilla.partials.image')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            <div class="form-group">
                <div class="col-sm-offset-10 col-sm-2">
                    <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                    <a href="{{url('flotilla')}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
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
            $(".select3").select2();
        });
    </script>

@endsection
