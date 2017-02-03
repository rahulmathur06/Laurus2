@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-car"></i> Autos</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('flotilla')}}">Autos</a></li>
        <li><a href="{{url('flotilla')}}">Flotilla</a></li>
        <li class="active">Index</li>
    </ol>
@endsection
@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">Flotillas</h3>
                    <div class="btn-group btn-group-sm pull-right">
                        <a href="{{route('flotilla.create')}}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Añadir </a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Clase</th>
                            <th>Grupo</th>
                            <th>Nombre</th>
                            <th>Puertas</th>
                            <th>Transmision</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($flotillas as $flotilla)
                            <tr>
                                <td>{{$flotilla->clase->translation('es-MX')->get()->first()->nombre}}</td>
                                <td>{{$flotilla->grupo}}</td>
                                <td>{{$flotilla->nombre}}</td>
                                <td>{{$flotilla->puertas}}</td>
                                <td>{{(strcmp($flotilla->transmision, 'STD') == 0 ? 'STANDAR' : 'AUTOMATICA')}}</td>
                                <td>
                                    <a href="{{route('flotilla.edit',$flotilla->id)}}" class="btn btn-default " title="Editar "
                                            ><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="delete"
                                       data-url="{{route('flotilla.destroy',$flotilla->id)}}">
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
