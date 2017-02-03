@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("bower_components/admin-lte/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
@stop
@section('content-header')
    <h1>REPORTE DE FLOTA
        <small>Disponibilidad</small>
    </h1>
@stop
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box">

            <div class="box-body">
				<table class="table table-stripped table-bordered" id="tablaFlota">
					<thead>
					        <th>Clave</th>
                            <th>Modelo</th>
                            <th>Placas</th>
                            <th>Propiedad</th>
                            <th>Estatus</th>
                            <th>Descripcion</th>
                            <th>Fecha Estatus</th>

					</thead>
					<tbody>
                        @foreach ($flotas as $flota)
                     <tr>
                     <td class="text-center">{!! $flota->clave !!}</td>
                     <td>{!! $flota->modelo !!}</td>
                     <td>{!! $flota->placas !!}</td>
                     <td>{!! $flota->Propiedad !!}</td>
                     <td>{!! $flota->status !!}</td>
                     <td>{!! $flota->descripcion !!}</td>
                     <td>{!! $flota->fecha_status !!}</td>



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