<div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a  id="details_tab" href="#details" data-toggle="tab">Detalles</a></li>
                    <li id="precios_tab"><a href="#precios" data-toggle="tab">Precios</a></li>
                </ul>
                <hr/>
                <div class="tab-content">
                    <div class="tab-pane active" id="details">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12" id="details-content">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="precios">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12 scrollable">
                                    <table class="table table-hover task-table">
                                        <thead>
                                        <tr>
                                            <th>CODIGO SIPP</th>
                                            <th>CLASE</th>
                                            <th>PRECIO</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($clases as $clase)
                                            <tr class="form-group @if($errors->has('precio')) has-error @endif)">
                                                <td>{!! Form::text('codigo', $clase['sipp'], ['disabled', 'class' => 'form-control']) !!}</td>
                                                <td>{!! Form::text('clase', $clase['clase'], ['disabled', 'class' => 'form-control']) !!}</td>
                                                <td>
                                                {!! Form::text('precio_dup['.$clase['sipp']. ']', null, ['class' => 'form-control price_duplicate', 'onKeyDown' => 'return isKeyAllowed(event)','onKeyUp' => 'formatCurrency(this, event)', 'onBlur' => 'checkFormat(this)']) !!}
                                                @if(isset($precio[$clase['sipp']]))
                                                {!! Form::hidden('precio['.$clase['sipp']. ']', $precio[$clase['sipp']], ['class' => 'price_original']) !!}
                                                @else
                                                {!! Form::hidden('precio['.$clase['sipp']. ']', null, ['class' => 'price_original']) !!}
                                                @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.tab-content -->
            </div>
        </div><!-- /.col -->
    </div><!-- /.row -->