@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-building-o"></i> Locaciones</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('locacion')}}">Locaciones</a></li>
        <li><a href="{{url('locacion')}}">Oficinas</a></li>
        <li class="active">Index</li>
    </ol>
@endsection
@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Oficinas</h3>
                    <div class="btn-group btn-group-sm pull-right">
                        <a href="{{route('locacion.create')}}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Añadir</a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Orden</th>
                            <th>Locacion</th>
                            <th>Ciudad</th>
                            <th>Grupo</th>
                            <th>Activo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($locaciones as $locacion)
                            <tr>
                                <td>{{$locacion->orden}}</td>
                                <td>{{$locacion->translation('es-MX')->get()->first()->nombre}}</td>
                                <td>{{$locacion->ciudad->nombre}}</td>
                                <td>{{$locacion->grupo}}</td>
                                <td>{{($locacion->activo != 0)? 'Si': 'No'}}</td>
                                <td>
                                    <a href="{{route('locaciontranslate.index',$locacion->id)}}" class="btn btn-primary " title="Traducciones"
                                            ><i class="fa fa-list"></i></a>
                                    <a href="{{route('locacionclases.create',$locacion->id)}}" class="btn bg-aqua" title="Clases"
                                            ><i class="fa fa-car"></i></a>
                                    <a href="{{route('locacion.show',$locacion->id)}}" class="btn bg-yellow " title="Ver"
                                            ><i class="fa fa-eye"></i> </a>
                                    <a href="{{route('locacion.edit',$locacion->id)}}" class="btn btn-default " title="Editar"
                                            ><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="delete"
                                       data-url="{{route('locacion.destroy',$locacion->id)}}">
                                        <i class="fa fa-trash"></i></a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->

    @endsection
    @section('scripts')
            <!-- DATA TABES SCRIPT -->
    <script src="{{asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- confirmation -->
    <script src="{{asset('js/ajax.js')}}"></script>
    <script src="{{asset('bower_components/admin-lte/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('bower_components/admin-lte/plugins/select2/select2.full.js') }}" type="text/javascript"></script>
    <script>
        $(function () {
            $(".select2").select2();
        });
    </script>
@endsection
