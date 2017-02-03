<fieldset>
    <legend>Información Básica</legend>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('nombre')) has-error @endif">
            <label class="required control-label  ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
             Nombre
         </span>
            </label>
            {!! Form::text('nombre',null,['class' => 'form-control','id' => 'nombre']) !!}
        </div><!-- /.form-group -->

        <div class="form-group @if ($errors->has('puertas')) has-error @endif">
            <label class="required control-label  ">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Numero de puertas que contiene el automóvil. minimo 1 y máximo 5">
                    Numero de puertas
                </span>
            </label>
            {!! Form::text('puertas',null,['class' => 'form-control','id' => 'puertas']) !!}

        </div><!-- /.form-group -->
        <div class="form-group @if ($errors->has('equipaje_chico')) has-error @endif">
            <label class="required control-label ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Minimo de equipaje del automóvil">
                     Equipaje chico
                 </span>
            </label>
            {!! Form::text('equipaje_chico',null,['class' => 'form-control','id' => 'equipaje_chico']) !!}

        </div><!-- /.form-group -->
    </div><!-- /.col -->

    <div class="col-md-4">
        <div class="form-group @if ($errors->has('transmision')) has-error @endif">
            <label class="required control-label  ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de transmision del automóvil">
                 Tipo de transmision
             </span>
            </label>

            {!! Form::select('transmision',$transmision,null,['class'=>'form-control select3 select2-hidden-accessible','style'=>'width :100%']) !!}
        </div><!-- /.form-group  -->

        <div class="form-group @if ($errors->has('aire_acondicionado')) has-error @endif">
            <label class="required control-label  ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                 Aire acondicionado
             </span>
            </label>

            {!! Form::select('aire_acondicionado',$aire,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%']) !!}
        </div><!-- /.form-group -->
        <div class="form-group @if ($errors->has('equipaje_grande')) has-error @endif">
            <label class="required control-label  ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Máximo de equipaje del automóvil">
                     Equipaje Grande
                 </span>
            </label>
            {!! Form::text('equipaje_grande',null,['class' => 'form-control','id' => 'equipaje_grande']) !!}

        </div><!-- /.form-group -->


    </div><!-- /.col -->
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('id_clase')) has-error @endif">
            <label class="required control-label  ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Clase a la que pertenece el automóvil">
                     Clase
                 </span>
            </label>

            {!! Form::select('clase_id',$clases,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%']) !!}
        </div><!-- /.form-group  -->

        <div class="form-group @if ($errors->has('pasajeros')) has-error @endif">
            <label class="required control-label  ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Cantidad de numero de pasajeros. Caracteres invalidos ·$%&/()=?A-Z">
                     Numero de pasajeros
                 </span>
            </label>
            {!! Form::text('pasajeros',null,['class' => 'form-control','id' => 'pasajeros']) !!}

        </div><!-- /.form-group -->
        <div class="form-group @if ($errors->has('grupo')) has-error @endif">
            <label class="required control-label  ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Grupo al que pertenece el automóvil">
                     Grupo
                 </span>
            </label>
            {!! Form::select('grupo',$grupos,null,['class'=>'form-control select3 select2-hidden-accessible','style'=>'width :100%']) !!}
        </div><!-- /.form-group  -->


    </div>

</fieldset>