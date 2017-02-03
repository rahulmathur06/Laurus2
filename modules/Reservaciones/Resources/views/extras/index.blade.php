@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
@endsection
@section('content-header')
    <h1>Extras</h1>
    <ol class="breadcrumb">
        <li><a href="{{url('dashboard')}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="{{url('extras')}}">Extras</a></li>
        <li><a href="{{url('extras')}}">Lista de Extras</a></li>
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
                        <a href="{{route('extras.create')}}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Añadir </a>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Descripcion es-MX</th>
                            <th>Descripcion en-US</th>
                            <th>Cost MN</th>
                            <th>Cost USD</th>
                            <th>Increm.</th>
                            <th>Activo</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($extras as $extra)
                            <tr>
                                <td>{{$extra->descripcion_esMX}}</td>
                                <td>{{$extra->descripcion_enUS}}</td>
                                <td>{{$extra->costo_mxn}}</td>
                                <td>{{$extra->costo_usd}}</td>
                                <td>@if($extra->incrementable == 1)<i class="fa fa-check-square-o"></i>@else<i class="fa fa-square-o"></i>@endif</td>
                                <td>@if($extra->activo == 1)<i class="fa fa-check-square-o"></i>@else<i class="fa fa-square-o"></i>@endif</td>
                                <td>
                                    <a href="{{route('extras.edit',$extra->id)}}" class="btn btn-default" title="Editar "
                                            ><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-danger "
                                       data-toggle="confirmation"
                                       data-singleton="true"
                                       data-btn-type="delete"
                                       data-url="{{route('extras.destroy',$extra->id)}}">
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
