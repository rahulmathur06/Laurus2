@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-car"></i> FUERA DE SERVICIO</h1>
    <ol class="breadcrumb">
        <li><a href="{{route('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{route('fueraservicio.index')}}">Siniestros</a></li>
        <li><a href="{{route('fueraservicio.index')}}">Fuera de Servicio</a></li>
        <li class="active">Index</li>
    </ol>
@endsection
@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title"></h3>
                    <div class="btn-group btn-group-sm pull-right">
                        <a href="{{route('fueraservicio.create')}}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Nuevo Record </a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Código Auto</th>
                            <th>Sucursal</th>
                            <th>Siniestro</th>
                            <th>Tipo de Siniestro</th>
                            <th>Fecha Siniestro</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($FlotillaSiniestros as $flotilla)
                            <tr>
                                <td>{{$flotilla->clave}}</td>
                                <td>{{$flotilla->sucursal}}</td>
                                <td>{{$flotilla->numSiniestro}}</td>
                                <td>{{$flotilla->tipo_siniestro}}</td>
                                <td>{{$flotilla->fecha_del_siniestro}}</td>
                                <td>
                                    <a href="{{route('fueraservicio.edit',$flotilla->siniestro_id)}}" class="btn btn-default " title="Editar "
                                            ><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="delete"
                                       data-url="{{route('fueraservicio.destroy',$flotilla->siniestro_id)}}">
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

@endsection
