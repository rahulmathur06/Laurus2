@extends('layout.master')
@section('css')
    <link href="{{ asset("bower_components/admin-lte/plugins/datatables/dataTables.bootstrap.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("bower_components/admin-lte/plugins/select2/select2.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("bower_components/admin-lte/plugins/datepicker/datepicker3.css")}}" rel="stylesheet" type="text/css" />
@stop
@section('content-header')
    <h1>REPORTE DE FLOTA
        <small>Inventario</small>
    </h1>
@stop
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="box">

        <table style="width:100%">
                  <tr>
                    <th>
                    <div class="panel-body">
                                       <form method="POST" id="search-form-oficina" class="form-inline" role="form">
                                         <div class="form-group">
                                         <label for="oficina">Filtrar por oficina:</label>
                                           <select class="form-control" name="operator_oficina" id="operator_oficina">
                                             <option value="0" selected="selected">Seleccione</option>
                                             <option value="BJXC01">BJXC01</option>
                                             <option value="BJXT01">BJXT01</option>
                                             <option value="CULT01">CULT01</option>
                                             <option value="GDLC01">GDLC01</option>
                                             <option value="GDLC06">GDLC06</option>
                                             <option value="GDLR01">GDLR01</option>
                                             <option value="GDLS02">GDLS02</option>
                                             <option value="GDLT01">GDLT01</option>
                                             <option value="HMOC01">HMOC01</option>
                                             <option value="HMOT01">HMOT01</option>
                                             <option value="HMOT02">HMOT02</option>
                                            <option value="LAPT01">LAPT01</option>
                                            <option value="MEXC03">MEXC03</option>
                                            <option value="MEXC08">MEXC08</option>
                                            <option value="MEXC17">MEXC17</option>
                                            <option value="MEXC18">MEXC18</option>
                                            <option value="MEXR01">MEXR01</option>
                                            <option value="MEXT01">MEXT01</option>
                                            <option value="MTYS01">MTYS01</option>
                                            <option value="MTYS03">MTYS03</option>
                                            <option value="MTYT01">MTYT01</option>
                                            <option value="MXLC02">MXLC02</option>
                                            <option value="MXLT01">MXLT01</option>
                                            <option value="MZTC01">MZTC01</option>
                                            <option value="MZTT01">MZTT01</option>
                                            <option value="PBCR01">PBCR01</option>
                                            <option value="PBCT01">PBCT01</option>
                                            <option value="PRVC11">PRVC11</option>
                                            <option value="PVRC11">PVRC11</option>
                                            <option value="PVRN02">PVRN02</option>
                                            <option value="PVRR01">PVRR01</option>
                                            <option value="PVRT01">PVRT01</option>
                                            <option value="QROC01">QROC01</option>
                                            <option value="QROC02">QROC02</option>
                                            <option value="QROO01">QROO01</option>
                                            <option value="QROT01">QROT01</option>
                                            <option value="SJDC01">SJDC01</option>
                                            <option value="SJDC02">SJDC02</option>
                                            <option value="SJDC06">SJDC06</option>
                                            <option value="SJDC11">SJDC11</option>
                                            <option value="SJDC15">SJDC15</option>
                                            <option value="SJDR06">SJDR06</option>
                                            <option value="SJDR11">SJDR11</option>
                                            <option value="SJDR12">SJDR12</option>
                                            <option value="SJDS01">SJDS01</option>
                                            <option value="SJDT01">SJDT01</option>
                                            <option value="SJDT61">SJDT61</option>
                                            <option value="SLPC02">SLPC02</option>
                                            <option value="SLPO01">SLPO01</option>
                                            <option value="SLWC01">SLWC01</option>
                                            <option value="TIJC02">TIJC02</option>
                                            <option value="TIJT01">TIJT01</option>
                                            <option value="TLCO01">TLCO01</option>
                                            <option value="TLCO02">TLCO02</option>
                                            <option value="TLCR01">TLCR01</option>
                                           </select>
                                           </div>
                                         <button type="submit" class="btn btn-primary">Buscar</button>
                                       </form>
                                       <button type="button" id="limpiar_oficina" name="limpiar_oficina" >Limpiar filtro</button>
                                    </div>
                    </th>
                    <th>
                    <div class="panel-body">
                        <form method="POST" id="search-form-plaza" class="form-inline" role="form">
                          <div class="form-group">
                                <label for="plaza">Filtrar por plaza:</label>
                                <select class="form-control" name="operator_plaza" id="operator_plaza">
                                    <option value="0" selected="selected">Seleccione</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>

                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                                </form>

                            <button type="button" id="limpiar_plaza" name="limpiar_plaza" >Limpiar filtro</button>
                        </div>
                    </th>
                    <th>
                        <div class="panel-body">
                             <form method="POST" id="search-form-bajas" class="form-inline" role="form">
                                   <div class="form-group">
                                   <label for="bajas">Mostrar Bajas</label>
                                   <div class="form-group">
                                  	    <input type="checkbox" name="operator_bajas" value="96" id="operator_bajas">
                                   </div>
                                   </div>
                                  <button type="submit" class="btn btn-primary">Buscar</button>
                             </form>
                             <button type="button" id="limpiar_bajas" name="limpiar_bajas" >Limpiar filtro</button>
                        </div>
                    </th>
                  </tr>
                  <tr>
                    <th>
                    <div class="panel-body">
                        <form method="POST" id="search-form-otras" class="form-inline" role="form">
                              <div class="form-group">
                              <label for="otras">No mostrar unidades en otras plazas</label>
                              <div class="form-group">
                             	    <input type="checkbox" name="operator_otras" value="Propio" id="operator_otras">
                              </div>
                              </div>
                             <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                        <button type="button" id="limpiar_otras" name="limpiar_otras" >Limpiar filtro</button>
                    </div>
                    </th>
                    <th>
                    <div class="panel-body">
                        <form method="POST" id="search-form-prestadas" class="form-inline" role="form">
                              <div class="form-group">
                              <label for="prestadas">Mostrar unidades prestadas</label>
                              <div class="form-group">
                             	    <input type="checkbox" name="operator_prestadas" value="Prestamo a la Plaza" id="operator_prestadas">
                              </div>
                              </div>
                             <button type="submit" class="btn btn-primary">Buscar</button>
                        </form>
                        <button type="button" id="limpiar_prestadas" name="limpiar_prestadas" >Limpiar filtro</button>
                    </div>
                    </th>
                    <th>
						<div class="panel-body">
					       <form method="POST" id="search-form-sin-bajas" class="form-inline" role="form">
					          <div class="form-group">
					             <label for="sin-bajas" hidden>Mostrar sin Bajas</label>
					                 <div class="form-group">
					                    <input type="checkbox" name="operator_sin_bajas" value="96" id="operator_sin_bajas" checked hidden/>
					                 </div>
					          </div>
					          <button type="submit" class="btn btn-primary" style="color: transparent; background-color: transparent; border-color: transparent;">Buscar</button>
					       </form>
					    <button type="button" id="limpiar_sin_bajas" name="limpiar_sin_bajas" hidden>Limpiar filtro</button>
					 </div>
                    </th>
                  </tr>
        </table>

        </div><!-- /.box -->

        <div class="box">
            <div class="box-body">
				<table class="table table-stripped table-bordered" id="tablaFlota">
					<thead>
					        <th>Clave Ubicacion</th>
					        <th>Ubicado</th>
                            <th>Clave Pertenece</th>
                            <th>Pertenece</th>
                            <th>Oficina</th>
                            <th>Clave</th>
                            <th>Modelo</th>
                            <th>Placas</th>
                            <th>Propiedad</th>
                            <th>Status</th>
                            <th>Descripcion del Status</th>
                            <th>Fecha Estatus</th>
					</thead>
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
                		tabla =	$("#tablaFlota").DataTable({
                		        "language": {
                        		            "url": '{!! asset("bower_components/admin-lte/plugins/datatables/lang/spanish.json") !!}'
                        		        },
                		       "processing": true,
                               "serverSide": true,
                                "ajax": {
                                            url: '{!! route("InventarioController.data") !!}',
                                            data: function (d) {
                                                d.operator_oficina = $('select[name=operator_oficina]').val();
                                                d.operator_plaza = $('select[name=operator_plaza]').val();
                                                d.operator_bajas = $('#operator_bajas:checked').val();
                                                d.operator_otras = $('#operator_otras:checked').val();
                                                d.operator_prestadas = $('#operator_prestadas:checked').val();
												d.operator_sin_bajas = $('#operator_sin_bajas:checked').val();
                                            }
                                        },
                                "columns": [
                                            {data: 'ClaveU', name: 'ClaveU'},
                                            {data: 'Ubicado', name: 'Ubicado'},
                                            {data: 'ClaveP', name: 'ClaveP'},
                                            {data: 'Pertenece', name: 'Pertenece'},
                                            {data: 'oficina', name: 'oficina'},
                                            {data: 'clave', name: 'clave'},
                                            {data: 'modelo', name: 'modelo'},
                                            {data: 'placas', name: 'placas'},
                                            {data: 'Propiedad', name: 'Propiedad'},
                                            {data: 'status', name: 'status'},
                                            {data: 'descripcion', name: 'descripcion'},
                                            {data: 'fecha_status', name: 'fecha_status'},
                                        ],
										"filter": false
                			});

                			$('#limpiar_prestadas').click(function (e){
                                   var obj=document.getElementById("operator_prestadas").checked = false;
                                   tabla.draw();
                                   e.preventDefault();
                            });

                			$('#limpiar_otras').click(function (e){
                               var obj=document.getElementById("operator_otras").checked = false;
                               tabla.draw();
                               e.preventDefault();
                            });

                			$('#limpiar_bajas').click(function (e){
                                var obj=document.getElementById("operator_bajas").checked = false;
								var obj=document.getElementById("operator_sin_bajas").checked = true;
                                tabla.draw();
                                e.preventDefault();
                            });
							
							$('#limpiar_sin_bajas').click(function (e){
                                var obj=document.getElementById("operator_sin_bajas").checked = false;
                                tabla.draw();
                                e.preventDefault();
                            });

                            $('#limpiar_oficina').click(function (e){
                            var obj=document.getElementById("operator_oficina").value = 0;
                                tabla.draw();
                                e.preventDefault();
                            });

                            $('#limpiar_plaza').click(function (e){
                            var obj=document.getElementById("operator_plaza").value = 0;
                                tabla.draw();
                                e.preventDefault();
                            });

                            $('#search-form-bajas').on('submit', function(e) {
								 var obj=document.getElementById("operator_sin_bajas").checked = false;
                                 tabla.draw();
                                 e.preventDefault();
                            });

                            $('#search-form-oficina').on('submit', function(e) {
                                 tabla.draw();
                                 e.preventDefault();
                            });

                            $('#search-form-plaza').on('submit', function(e) {
                                 tabla.draw();
                                 e.preventDefault();
                            });

                            $('#search-form-otras').on('submit', function(e) {
                               // alert($('#operator_otras:checked').val());
                                 tabla.draw();
                                 e.preventDefault();
                            });

                            $('#search-form-prestadas').on('submit', function(e) {
                                 tabla.draw();
                                 e.preventDefault();
                            });
							$('#search-form-sin-bajas').on('submit', function(e) {
                                tabla.draw();
                                e.preventDefault();
                            });
                		});

	</script>
@stop