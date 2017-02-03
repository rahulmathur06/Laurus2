@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("bower_components/admin-lte/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
@stop
@section('content-header')
    <h1>Flota
        <small>Vehiculos</small>
    </h1>
@stop
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <div class="btn-group btn-group-sm pull-right">
                    <a href="{{route('flota.crear.create')}}" class="btn btn-success btn-flat"><i class="fa fa-plus"></i> Añadir Vehiculo</a>
                </div>
                <div class="col-lg-12">
                    @include('flash::message')
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
				<table class="table table-stripped table-bordered" id="tablaFlota">
					<thead>
					        <th>Clave</th>
                            <th>Grupo</th>
                            <th>Cia Seguros</th>
                            <th>Clave Int</th>
                            <th>Tipo</th>
                            <th>Modelo</th>
                            <th>Marca</th>
                            <th>Color</th>
                            <th>Serie</th>
                            <th>Placas</th>
                            <th>Plaza Contable</th>
						<th class="text-center" style="min-width:80px !important"></th>
					</thead>
					<tbody>
                        @foreach ($flotas as $flota)
                     <tr>
                     <td class="text-center">{!! $flota->clave !!}</td>
                     <td>{!! $flota->grupo !!}</td>
                     <td>{!! $flota->cia_seguros !!}</td>
                     <td>{!! $flota->clave_int !!}</td>
                     <td>{!! $flota->tipo !!}</td>
                     <td>{!! $flota->modelo !!}</td>
                     <td>{!! $flota->marca !!}</td>
                     <td>{!! $flota->color !!}</td>
                     <td>{!! $flota->serie !!}</td>
                     <td>{!! $flota->placas !!}</td>
                     <td>{!! $flota->plaza_contable !!}</td>

                      <td class="text-center">
                        <div class="btn-group">
                        <a href="{!! route('flota.editar.edit', $flota->ID) !!}" class="btn btn-info btn-flat" title="Editar" data-toggle="tooltip"><i class="glyphicon glyphicon-edit"></i></a>
                        	<button class="btn btn-danger "
                             data-toggle="confirmation"
                             data-singleton="true"
                             data-btn-type="delete"
                             data-url="{{route('flota.eliminar.destroy', $flota->ID)}}">
                        	<i class="glyphicon glyphicon-trash"></i></button>
                        </div>
                      </td>
                      </tr>
                      @endforeach
					</tbody>
				</table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
@stop
@section('scripts')
    <!-- DATA TABES SCRIPT -->
    <script src="{{asset('bower_components/admin-lte/plugins/datatables/jquery.dataTables.min.js') }}" type="text/javascript"></script>
    <script src="{{asset('bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.min.js') }}" type="text/javascript"></script>
    <!-- confirmation -->
    <script src="{{asset('js/ajax.js')}}"></script>
    <script src="{{asset('bower_components/admin-lte/plugins/bootstrap-confirmation/bootstrap-confirmation.min.js') }}" type="text/javascript"></script>
	<script>
		$(document).ready(function(){
			$("#tablaFlota").DataTable({
				"language": {
		            "url": '{!! asset("bower_components/admin-lte/plugins/datatables/lang/spanish.json") !!}'
		        }
			});

		});

	</script>
@stop