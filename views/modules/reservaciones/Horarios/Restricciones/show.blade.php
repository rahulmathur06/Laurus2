@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1><i class="fa fa-clock-o"></i> Horarios</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('restriccion')}}">Restricción</a></li>
        <li class="active">Index</li>
    </ol>
@endsection
@section('content')
{{--
    @include('flash::message')
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header">
                    <div class="btn-group btn-group-sm pull-left">
                        <a href="{{ url('restriccion') }}" class="btn btn-success btn-flat"><i class="fa  fa-reply"></i> Regresar </a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th># de día</th>
                            <th>Día</th>
                            <th>Horario</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($restricciones as $restriccion)
                            <tr>
                                <td>{{$restriccion->daynumber}}</td>
                                <td>{{$restriccion->day}}</td>
                                <td>{{$restriccion->time}}</td>
                                <td>
                                    <a href="{{route('restriccion.edit',$restriccion->id)}}" class="btn btn-default " title="Horarios de restricción"
                                            ><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
    --}}
    @endsection
    @section('scripts')
            <!-- DATA TABES SCRIPT -->
    <script src="{{asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- confirmation -->
    <script src="{{asset('js/ajax.js')}}"></script>
    <script src="{{asset('bower_components/admin-lte/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}" type="text/javascript"></script>
@endsection
