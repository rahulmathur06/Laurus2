@extends('layout.master')
@section('css')
    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <style>
        #map-container {

            height: 200px;
            margin: 0px;
            padding: 0px

             }
    </style>
    @endsection
@section('content-header')
    <h1><i class="fa  fa-building-o"></i> Locaciones</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('locacion')}}">Locaciones</a></li>
        <li><a href="{{url('locacion')}}">Oficinas</a></li>
        <li class="active">Ver</li>
    </ol>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h1 class="box-title">Locación</h1>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    @foreach($locacion->translate as $translation)
                        <div class="col-md-6">
                            <div class="form-group">
                                {!! Form::label('nombre','Nombre ') !!}
                                {!! Form::text('nombre',$translation->nombre ,['class' => 'form-control','id' => 'nombre_es','disabled']) !!}
                            </div><!-- /.form-group -->
                        </div><!-- /.col  -->
                    @endforeach


                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('grupo','Grupo ') !!}
                            {!! Form::text('orden',$locacion->grupo,['class' => 'form-control','id' => 'orden','disabled']) !!}
                        </div><!-- /.form-group  -->
                        <div class="form-group">
                            {!! Form::label('orden','Orden ') !!}
                            {!! Form::text('orden',$locacion->orden,['class' => 'form-control','id' => 'orden','disabled']) !!}

                        </div><!-- /.form-group -->
                        <div class="form-group">
                            {!! Form::label('id_ciudad','Ciudad ') !!}
                            {!! Form::text('id_ciudad',$locacion->ciudad->nombre,['class'=> 'form-control','disabled']) !!}
                        </div><!-- /.form-group  -->

                    </div><!-- /.col -->

                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('clave','Clave ') !!}
                            {!! Form::text('clave',$locacion->clave,['class' => 'form-control','id' => 'clave','disabled']) !!}
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            {!! Form::label('iva','IVA ') !!}
                            {!! Form::text('iva',$locacion->iva,['class' => 'form-control','id' => 'iva','disabled']) !!}
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            {!! Form::label('activo','Activo ') !!}
                            {!! Form::text('activo',$locacion->activo,['class' => 'form-control','id' => 'airporfee','disabled']) !!}
                        </div><!-- /.form-group -->
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            {!! Form::label('clave_jr','Clave JR ') !!}
                            {!! Form::text('clave_jr',$locacion->clave_jr,['class' => 'form-control','id' => 'clave_jr','disabled']) !!}
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            {!! Form::label('airportfee','Airportfee ') !!}
                            {!! Form::text('airportfee',$locacion->airportfee,['class' => 'form-control','id' => 'airporfee','disabled']) !!}
                        </div><!-- /.form-group -->
                    </div><!-- /.col -->


                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <div class="form-group">
                        <div class="pull-right">
                            <a href="{{route('locacion.edit',$locacion->id)}}" class="btn btn-primary " title="Editar"
                                    ><i class="fa fa-pencil"></i> Editar</a>
                            <a href="{{url('locacion')}}" class="btn btn-default" ><i class="fa fa-mail-reply"></i> Regresar</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-6">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Hubicación Google Maps</h3> <label style="color: red">(Nota: Zoom, Latitud, Longitud, es necesario para pintar el mapa)</label>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="map-container" ></div> <br>
                    <div class="col-md-3">

                        <div class="form-group ">
                            {!! Form::label('latitud','Latitud ') !!}
                            {!! Form::text('latitud',$locacion->latitud,['class' => 'form-control','id' => 'latitud','disabled']) !!}
                        </div><!-- /.form-group -->
                        <div class="form-group ">
                            {!! Form::label('zoom','Zoom ') !!}
                            {!! Form::text('zoom',$locacion->zoom,['class' => 'form-control','id' => 'zoom','disabled']) !!}
                        </div><!-- /.form-group -->
                    </div><!-- /.col  -->
                    <div class="col-md-3">
                        <!-- /.form-group -->
                        <div class="form-group">
                            {!! Form::label('longitud','Longitud ') !!}
                            {!! Form::text('longitud',$locacion->longitud,['class' => 'form-control','id' => 'longitud','disabled']) !!}
                        </div><!-- /.form-group -->

                    </div><!-- /.col  -->
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('centro_latitud','Centro Latitud ') !!}
                            {!! Form::text('centro_latitud',$locacion->centro_latitud,['class' => 'form-control','id' => 'centro_latitud','disabled']) !!}
                        </div><!-- /.form-group -->
                    </div><!-- /.col  -->
                    <div class="col-md-3">
                        <div class="form-group">
                            {!! Form::label('centro_longitud','Centro Longitud ') !!}
                            {!! Form::text('centro_longitud',$locacion->centro_longitud,['class' => 'form-control','id' => 'centro_longitud','disabled']) !!}
                        </div><!-- /.form-group -->
                    </div><!-- /.col  -->
                    <div class="col-md-9">
                        <div class="form-group">
                            {!! Form::label('direccion_google_maps','Direccion Google Maps ') !!}
                            {!! Form::text('direccion_google_maps',$locacion->direccion_google_maps,['class' => 'form-control','id' => 'direccion_google_maps','disabled']) !!}
                        </div><!-- /.form-group -->
                    </div><!-- /.col -->

                </div>
            </div>

        </div>
        <div class="col-md-6">
            <div class="box box-danger">
                <div class="box-header with-border">
                    <h1 class="box-title">Dirección</h1>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('direccion','Direccion ') !!}
                            {!! Form::text('direccion',$locacion->direccion->direccion ,['class' => 'form-control','id' => 'direccion','disabled']) !!}
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            {!! Form::label('tel1','Telefono') !!}
                            {!! Form::text('tel1',$locacion->direccion->tel1 ,['class' => 'form-control','id' => 'tel1','disabled']) !!}
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            {!! Form::label('horario','Horario') !!}
                            {!! Form::text('horario',$locacion->direccion->horario ,['class' => 'form-control','id' => 'horario','disabled']) !!}
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            {!! Form::label('cp','Código postal') !!}
                            {!! Form::text('cp',$locacion->direccion->cp ,['class' => 'form-control','id' => 'cp','disabled']) !!}
                        </div><!-- /.form-group -->
                    </div><!-- /.col  -->
                    <div class="col-md-6">
                        <div class="form-group ">
                            {!! Form::label('colonia','Colonia') !!}
                            {!! Form::text('colonia',$locacion->direccion->colonia,['class' => 'form-control','id' => 'colonia','disabled']) !!}
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            {!! Form::label('tel2','Telefono (opcional)') !!}
                            {!! Form::text('tel2',$locacion->direccion->tel2 ,['class' => 'form-control','id' => 'tel2','disabled']) !!}
                        </div><!-- /.form-group -->
                        <div class="form-group">
                            {!! Form::label('horario2','Horario (opcional)') !!}
                            {!! Form::text('horario2',$locacion->direccion->horario2 ,['class' => 'form-control','id' => 'horario2','disabled']) !!}
                        </div><!-- /.form-group -->
                    </div><!-- /.col  -->


                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h1 class="box-title">Imagen</h1>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {!! HTML::image('img/locaciones/'.$locacion->imagen,null,['class' => 'img-responsive img-center','style'=>'margin: 0 auto;']) !!}

                </div>
            </div>
        </div>
    </div><!-- /.row -->



@endsection
@section('scripts')
    <script>
        function init_map() {
            var latitud = $('#latitud').val();
            var longitud = $('#longitud').val();
            var zoom = parseInt($('#zoom').val());
            var var_location = new google.maps.LatLng(latitud,longitud);

            var var_mapoptions = {
                center: var_location,
                zoom: zoom
            };

            var var_marker = new google.maps.Marker({
                position: var_location,
                map: var_map,
                title:"Venice"});

            var var_map = new google.maps.Map(document.getElementById("map-container"),
                    var_mapoptions);
            var_marker.setMap(var_map);
        }
        google.maps.event.addDomListener(window, 'load', init_map);

    </script>
@endsection

