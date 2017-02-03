
        <div class="form-group @if ($errors->has('direccion')) has-error @endif">
            <label class="required control-label col-lg-2 ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. Av. Alvaro Obregón #229 esq. Av. Independencia.">
                     Dirección
                 </span>
            </label>
            <div class="col-lg-8">
            {!! Form::text('direccion',$address->direccion,['class' => 'form-control','id' => 'direccion','placeholder'=>'Av. Alvaro Obregón #229 esq. Av. Independencia.']) !!}
            </div>
        </div><!-- /.form-group -->
        <div class="form-group @if ($errors->has('tel1')) has-error @endif">
            <label class="required control-label col-lg-2 ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. 01-624-145-6200 Ext. 31143">
                Teléfono
             </span>
            </label>
            <div class="col-lg-8">
            {!! Form::text('tel1',$address->tel1,['class' => 'form-control','id' => 'tel1','placeholder'=>' 01-983-832-2664']) !!}
            </div>
        </div><!-- /.form-group -->
        <div class="form-group @if ($errors->has('horario')) has-error @endif">
            <label class="required control-label col-lg-2 ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. Lun-Vie: 08:00 AM - 07:00 PM">
                    Horario
                 </span>
            </label>
            <div class="col-lg-8">
            {!! Form::text('horario',$address->horario,['class' => 'form-control','id' => 'horario','placeholder'=>'Lun-Vie: 08:00 AM - 07:00 PM']) !!}
            </div>
        </div><!-- /.form-group -->


        <div class="form-group @if ($errors->has('colonia')) has-error @endif">
            <label class="required control-label col-lg-2 ">
             <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos 0-9!<>?.$%&">
               Colonia
             </span>
            </label>
            <div class="col-lg-8">
            {!! Form::text('colonia',$address->colonia,['class' => 'form-control','id' => 'colonia','placeholder'=>'Col. Lagos de Oriente']) !!}
            </div>
        </div><!-- /.form-group -->

        <div class="form-group @if ($errors->has('tel2')) has-error @endif">
            <label class="control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. 01-624-145-6200 Ext. 31143">
            Teléfono <small>(Opcional)</small>
         </span>
            </label>
            <div class="col-lg-8">
            {!! Form::text('tel2',$address->tel2,['class' => 'form-control','id' => 'tel2','placeholder'=>' 01-983-832-2664']) !!}
            </div>
        </div><!-- /.form-group -->
        <div class="form-group @if ($errors->has('horario2')) has-error @endif">
            <label class="control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Ej. Lun-Vie: 08:00 AM - 07:00 PM">
            Horario <small>(opcional)</small>
         </span>
            </label>
            <div class="col-lg-8">
            {!! Form::text('horario2',$address->horario2,['class' => 'form-control','id' => 'horario2','placeholder'=>'Sáb-Dom: 08:00 AM - 06:00 PM']) !!}
            </div>
        </div><!-- /.form-group -->


        <div class="form-group @if ($errors->has('cp')) has-error @endif">
            <label class="required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Caracteres invalidos A-Z!<>?.$%&, maximo 5 digitos ">
            Código Postal
         </span>
            </label>
            <div class="col-lg-8">
            {!! Form::text('cp',$address->cp,['class' => 'form-control','id' => 'cp','placeholder'=>'44772']) !!}
            </div>
        </div><!-- /.form-group -->

        <div class="form-group @if ($errors->has('tipo_locacion')) has-error @endif">
            <label class=" required control-label col-lg-2 ">
         <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Aeropuerto o ciudad">
            Tipo de locación
         </span>
            </label>
            <div class="col-lg-8">
            {!! Form::select('tipo_locacion',$tipo,null,['class'=>'form-control']) !!}
            </div>
        </div><!-- /.form-group -->
        <input type="hidden" name="direccion_id" value="{{$address->id}}">

