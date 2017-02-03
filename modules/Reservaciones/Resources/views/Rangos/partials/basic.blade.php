            
            <label class="  required ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Categoria a la que va asignada la clase">
                   Location
                </span>
            </label>
            <div class="form-group @if ($errors->has('categoria_id')) has-error @endif">
          
            <div class="col-lg-8">
            @if(!isset($clase))
                {!! Form::select('locacion_id',$location,null,['id'=>'location_id','class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%']) !!}
            @else
            {!! Form::hidden('locacion_id',$clase->locacion_id,['class' => 'form-control','id' => 'locacion_id']) !!}
                {!! Form::select('locacion_id1',$location,null,['disabled'=>'true', 'readonly','id'=>'location_id','class'=>'form-control','style'=>'width :100%']) !!}
            @endif
            </div>
            @if(!isset($clase))
            <div class="col-lg-2">
                    <a  class="btn btn-primary" id="GetAutos" > OBTENER AUTOS</a>
            </div>
            @endif

            <div class="col-sm-offset-10 col-sm-2" id="action_btn">
                <button type="submit" class="btn btn-primary" id="enviar"><i class="fa fa-save"></i> Guardar</button>
                <a href="{{url('rangos')}}" class="btn btn-danger" ><i class="fa fa-remove"></i> Cancelar</a>
            </div>

            </div><!-- /.form-group  -->
            <div class="row" id="locationData">

            </div><br><br><br><br>
