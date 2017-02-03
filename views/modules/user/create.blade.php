@extends('layout.master')
@section('content-header')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
@endsection
    <h1>Usuarios
        <small>Crear usuario</small>
    </h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="box">
                <div class="box-body">
                    {!! Form::open(['route' => 'users.store',
                                    'files'=>'true',
                                    'method'=>'POST',
                                    'id'=>'form_users',
                                    'class'=> 'form-horizontal',
                                    'parsley-validate novalidate' ]  ) !!}
                    <div class="box-body">
                        @include('user::partials.form')
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-10 col-sm-2">
                            <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
                            <a href="{{url('users')}}" class="btn btn-default" >Cancelar</a>

                        </div>
                    </div>
                    {!! Form::close() !!}
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>   <!-- /.row -->
@endsection
@section('scripts')

    <script src="{{ asset ("bower_components/admin-lte/plugins/datepicker/bootstrap-datepicker.js") }}" type="text/javascript"></script>
    <script src="{{ asset ("bower_components/admin-lte/plugins/datepicker/locales/bootstrap-datepicker.es.js") }}" type="text/javascript"></script>

    <script>
      $(document).ready(function(){
        $("#fecha_nacimiento").datepicker({
        language: 'es',
        format:'yyyy-mm-dd',
        todayHighlight: true
      });

      $("#fecha_ingreso").datepicker({
              language: 'es',
              format:'yyyy-mm-dd',
              todayHighlight: true
            });

      });

    </script>

@endsection

