@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1>TARIFAS</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('tarifas')}}">Tarifas</a></li>
        <li><a href="{{url('tarifas')}}">Captura de Tarifas</a></li>
        <li class="active">Index</li>
    </ol>
@endsection
@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <div class="btn-group btn-group-sm pull-right">
                        <a href="{{route('tarifas.create')}}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Añadir </a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Nombre Tarifa</th>
                            <th>Tipo</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                            <th>Moneda</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tarifas as $tarifa)
                            <tr>
                                <td>{{$tarifa->nombre}}</td>
                                <td>{{$tarifa_types[$tarifa->tipo]}}</td>
                                <td>{{$tarifa->f_ini}}</td>
                                <td>{{$tarifa->f_fin}}</td>
                                <td>{{$tarifa->moneda}}</td>
                                <td>
                                    <a href="{{route('tarifas.show',$tarifa->id)}}" class="btn btn-warning" title="Editar "
                                            ><i class="fa fa-eye"></i></a>
                                    @if((int)$tarifa->status === 1)
                                    <a href="javascript:void(0)" class="btn btn-default disabled" title="Editar "
                                            ><i class="fa fa-pencil"></i></a>
                                    @else
                                    <a href="{{route('tarifas.edit',$tarifa->id)}}" class="btn btn-default" title="Editar "
                                            ><i class="fa fa-pencil"></i></a>
                                    @endif
                                    <a class="btn btn-danger "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="delete"
                                       data-url="{{route('tarifas.destroy',$tarifa->id)}}">
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
