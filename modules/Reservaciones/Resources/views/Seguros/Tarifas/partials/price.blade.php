<fieldset>
    <legend>Tarifas</legend>
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('cdw')) has-error @endif">
            <label class="required control-label ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="CDW Caracteres invalido A-Z·$%&/()=?¿">
                     Colisión de daños (CDW)
                 </span>
            </label>

            {!! Form::text('cdw',null,['class' => 'form-control','id' => 'cdw','tabindex'=>'4']) !!}

        </div><!-- /.form-group -->
        <div class="form-group @if ($errors->has('tpl')) has-error @endif">
            <label class="required control-label ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="TPL Caracteres invalido A-Z·$%&/()=?¿">
                     Daños a terceros (TPL
                 </span>
            </label>


            {!! Form::text('tpl',null,['class' => 'form-control','id' => 'tpl','tabindex'=>'6']) !!}

        </div><!-- /.form-group -->

    </div><!-- /.col  -->
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('pai')) has-error @endif">
            <label class="required control-label ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="PAI Caracteres invalido A-Z·$%&/()=?¿">
                     Gastos medicos personales (PAI)
                 </span>
            </label>


            {!! Form::text('pai',null,['class' => 'form-control','id' => 'pai','tabindex'=>'5']) !!}

        </div><!-- /.form-group -->
        <div class="form-group @if ($errors->has('dp')) has-error @endif">
            <label class="required control-label ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="DP Caracteres invalido A-Z·$%&/()=?¿">
                   Cero deducible (DP)
                 </span>
            </label>


            {!! Form::text('dp',null,['class' => 'form-control','id' => 'dp','tabindex'=>'7']) !!}

        </div><!-- /.form-group -->

    </div><!-- /.col  -->
</fieldset>