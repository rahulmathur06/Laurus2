@extends('layout.master')
@section('content-header')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
@endsection
    <h1>Flota
        <small>Crear auto</small>
    </h1>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <!-- general form elements disabled -->
            <div class="box">
                <div class="box-body">
                    {!! Form::open(['route' => 'flota.almacenar.store',
                                    'method'=>'POST',
                                    'id'=>'form_flota',
                                    'class'=> 'form-horizontal',
                                    'parsley-validate novalidate' ]  ) !!}
                    <div class="box-body">
			            @include('flota::vehiculos.form')
			        </div>    
                    <div class="form-group">
                        <div class="col-sm-offset-9 col-sm-3">
	                    	<div class="btn-group">
	                            <button type="submit" class="btn btn-primary" id="enviar">Guardar</button>
	                            <a href="{{ url('/flota/vehiculos') }}" class="btn btn-default" >Cancelar</a>
							</div>
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
       /* $("#ano").datepicker({
        language: 'es',
        format:'yyyy-mm-dd',
        todayHighlight: true
      });*/

      $("#fecha_compra").datepicker({
              language: 'es',
              format:'yyyy-mm-dd',
              todayHighlight: true
            });
 
      $("#fvenc_placas").datepicker({
              language: 'es',
              format:'yyyy-mm-dd',
              todayHighlight: true
       });
	   
       $("#fvenc_verif").datepicker({
               language: 'es',
               format:'yyyy-mm-dd',
               todayHighlight: true
        });

      });

    </script>

@endsection