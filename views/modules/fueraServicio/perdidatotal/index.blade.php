@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-car"></i> Perdida Total </h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('perdida')}}">Perdida</a></li>
        <li class="active">Index</li>
    </ol>
@endsection
@section('content')
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
<!--                    <h3 class="box-title">PERDIDA TOTAL</h3>-->
                    <div class="btn-group btn-group-sm pull-right">
                        <a href="{{route('perdida.create')}}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Nuevo Record </a>
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
                        @foreach($flotillaPerdidaTotal as $loss)
                            <tr>
                                <td>{{$loss->clave}}</td>
                                <td>{{$loss->sucursal}}</td>
                                <td>{{$loss->numReporte}}</td>
                                <td>{{$loss->tipo_siniestro}}</td>
                                <td>{{$loss->fecha_del_siniestro}}</td>
                                <td>
                                    <a href="{{route('perdida.edit',$loss->id)}}" class="btn btn-default " title="Editar "
                                            ><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="delete"
                                       data-url="{{route('perdida.destroy',$loss->id)}}">
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
