<div class='row'>
    <div class='col-md-6'>
        <div class="form-group @if ($errors->has('plazo')) has-error @endif">
            <label class="control-label col-md-4">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    Plazo
                </span>
            </label>
            <div class="col-md-8">
                {!! Form::number('plazo',null,['id'=>'plazo', 'disabled' => $requireCredit, 'class' => 'form-control']) !!}
            </div>
        </div><!-- /.form-group -->
    </div>

    <div class='col-md-6'>
        <div class="form-group @if ($errors->has('limite')) has-error @endif">
            <label class="control-label col-md-4">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Numero de puertas que contiene el automóvil. minimo 1 y máximo 5">
                    Límite
                </span>
            </label>
            <div class="col-md-8">
                {!! Form::text('limite_duplicate',null,['class' => 'form-control', 'disabled' => $requireCredit,'id' => 'limite_duplicate', 'required' => false, 'onKeyDown' => 'return isKeyAllowed(event)','onKeyUp' => 'formatCurrency(this, event)', 'onBlur' => 'checkFormat(this)']) !!}
                {!! Form::hidden('limite',null,['class' => 'form-control','id' => 'limite']) !!}
            </div>

        </div><!-- /.form-group -->
    </div>
</div>

<div class='row'>
    <div class='col-md-12'>
        <div class="form-group @if ($errors->has('garantia')) has-error @endif">
            <label class=" control-label col-md-2">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                    Garantia
                </span>
            </label>

            <div class="col-md-10">
                {!! Form::select('garantia',['voucher'=>'voucher','pagaré'=>'pagaré','garantía moral'=>'garantía moral'],null,['class'=>'form-control select2','style'=>'width :100%', 'disabled' => $requireCredit, 'id' => 'garantia']) !!}
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->

<div class='row'>
    <div class='col-md-12'>
        <div class="form-group @if ($errors->has('comprobante')) has-error @endif">
            <label class=" control-label col-md-2">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                    Comprobante
                </span>
            </label>

            <div class="col-md-10">
                {!! Form::select('comprobante',['cupon'=>'cupon','carta garantia'=>'carta garantia','carta solicitud'=>'carta solicitud'],null,['class'=>'form-control select2', 'disabled' => $requireCredit,'style'=>'width :100%', 'id' => 'comprobante']) !!}
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->

<div class='row'>
    <div class='col-md-12'>
        <div class="form-group @if ($errors->has('status')) has-error @endif">
            <label class=" control-label col-md-2">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                    Status
                </span>
            </label>

            <div class="col-md-10">
                {!! Form::select('status',['no otorgado'=>'no otorgado', 'suspendido'=>'suspendido', 'aprobado'=>'aprobado', 'no solicitado'=>'no solicitado', 'solicitado'=>'solicitado'],null,['class'=>'form-control select2', 'disabled' => $requireCredit,'style'=>'width :100%', 'id' => 'status']) !!}
            </div> 
        </div><!-- /.form-group -->
    </div>
</div> <!-- / .row-->
@if($requireCredit)
    <input type="hidden" name="id" value="{{ $EmpresaCredito->id }}">
@endif