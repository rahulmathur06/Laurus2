
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('cobertura_id')) has-error @endif">
            {!! Form::label('cobertura_id','Seguro de cobertura *') !!}
            {!! Form::select('cobertura_id',$coberturas,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','aria-hidden'=>'true','tabindex'=>'-1']) !!}
        </div>

        <div class="form-group @if ($errors->has('fechaini')) has-error @endif">
            {!! Form::label('fechaini','Fecha de inicio *') !!}
            {!! Form::text('fechaini',null,['class' => 'form-control','id' => 'start_date']) !!}

        </div>

        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            {!! Form::label('clave','Clave *') !!}

            {!! Form::text('clave',null,['class' => 'form-control','id' => 'clave']) !!}

        </div><!-- /.form-group -->

        <div class="form-group"@if ($errors->has('descripcion')) has-error @endif>
            {!! Form::label('descripcion','Descripción *') !!}
            {!! Form::textarea('descripcion', null, ['style'=>'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}

        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('plancode_id')) has-error @endif">
            {!! Form::label('plancode_id','Seguro plan code *') !!}
            {!! Form::select('plancode_id',$plancodes,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width: 100%','aria-hidden'=>'true','tabindex'=>'-1']) !!}

        </div>

        <div class="form-group @if ($errors->has('fechafin')) has-error @endif">
            {!! Form::label('fechafin','Fecha de vencimiento *') !!}
            {!! Form::text('fechafin',null,['class' => 'form-control','id' => 'due_date']) !!}
        </div>


        <div class="form-group @if ($errors->has('pages_id')) has-error @endif">
            {!! Form::label('pages_id','Pages ID *') !!}

            {!! Form::text('pages_id',null,['class' => 'form-control','id' => 'pages_id']) !!}

        </div><!-- /.form-group -->

        <div class="form-group"@if ($errors->has('terminos_condiciones')) has-error @endif>
            {!! Form::label('terminos_condiciones','Terminos y Condiciones *') !!}
            {!! Form::textarea('terminos_condiciones', null, ['style'=>'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}

        </div>
    </div>


