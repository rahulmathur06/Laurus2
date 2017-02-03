
<!--    <legend>Captura de Siniestro</legend>-->
<div class="row">
    <div class='col-md-6'>
        <fieldset>
            <legend>DATOS GENERALES</legend>
            @include('cuentascorporativas::empresas.partials.basic_data_general')
        </fieldset>
        <fieldset>
            <legend>EJECUTIVO ASIGNADO</legend>
            @include('cuentascorporativas::empresas.partials.basic_executive')
        </fieldset>
    </div>
    <div class="col-md-6">
        <fieldset>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="form-group @if ($errors->has('poliza')) has-error @endif">

                        <div class="col-md-10">
                            {!! Form::checkbox('cliente_fiscal', '1') !!} <strong>&nbsp;Cliente fiscal</strong>
                        </div> 
                    </div><!-- /.form-group -->
                </div>
            </div>
            <div class='row'>
                <div class='col-md-12'>
                    <div class="form-group @if ($errors->has('poliza')) has-error @endif">
                        <div class="col-md-10">
                            {!! Form::checkbox('requiere_credito', 'yes', $requireCredit, ['onclick' => 'collapseIfCreditNotRequired(this)', 'id' => 'requiere_credito']) !!} <strong>&nbsp;Requiere Crédito</strong>
                        </div> 
                    </div><!-- /.form-group -->
                </div>
            </div>
            <div class="row" id="collapsibleIfCreditNotRequired">
                <div class='col-md-10 col-md-offset-2'>
                    @if($requireCredit)
                    {!! Form::model($EmpresaCredito,['id'=>'form_empresas_register_credit','parsley-validate novalidate', 'class' => 'form-horizontal', 'token' => false]  ) !!}
                    @endif
                    @include('cuentascorporativas::empresas.partials.basic_empresa_credito')
                    @if($requireCredit)
                    {!! Form::model($Empresa) !!}
                    @endif
                </div>
            </div>
        </fieldset>

        <fieldset>
            <legend>OTROS DATOS DE LA EMPRESA</legend>
            @include('cuentascorporativas::empresas.partials.basic_other_info')
        </fieldset>

        <!-- Bootstrap modals -->
        <!-- Comments Model -->
        <div id="InsertCommentModal" class="modal fade" role="dialog">
            @include('cuentascorporativas::empresas.partials.basic_modal_comment')
        </div>

    </div>
</div>
