<div class="row">
<div class="col-md-12">
        <button class="btn btn-primary" data-toggle="modal" data-target="#InsertCommentModal" type="button">Comentarios</button>
</div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('numero_empleados')) has-error @endif">
            <label class="control-label">
                <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                    No. Aprox. de Empleados
                </span>
            </label>
                {!! Form::number('numero_empleados',null,['id'=>'numero_empleados','class' => 'form-control']) !!}
        </div><!-- /.form-group -->
    </div>
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('numero_empleados')) has-error @endif">
            <label class="control-label">
                <span>
                    Tipos Personas 
                </span>
            </label>
            {!! Form::select('tipo_persona_id',$personasTipo,null,['id'=>'tipo_persona_id','class' => 'form-control']) !!}
        </div><!-- /.form-group -->
    </div>
</div>
<span class='field-group-title'>Representante</span>
<div class="row">
    <div class='col-md-6'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="form-group @if ($errors->has('representante')) has-error @endif">
                    <label class=" control-label col-md-4">
                        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                            Nombre
                        </span>
                    </label>

                    <div class="col-md-8">
                        {!! Form::text('representante',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'representante']) !!}
                    </div> 
                </div><!-- /.form-group -->
            </div>
        </div> <!-- / .row-->
        <div class='row'>
            <div class='col-md-12'>
                <div class="form-group @if ($errors->has('telefono1')) has-error @endif">
                    <label class=" control-label col-md-4">
                        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                            Tel 1
                        </span>
                    </label>

                    <div class="col-md-8">
                        {!! Form::text('telefono1',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'telefono1']) !!}
                    </div> 
                </div><!-- /.form-group -->
            </div>
        </div> <!-- / .row-->
        <div class='row'>
            <div class='col-md-12'>
                <div class="form-group @if ($errors->has('logo')) has-error @endif">
                    <label class=" control-label col-md-4">
                        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                            Logo
                        </span>
                    </label>

                    <div class="col-md-8">
                        {!! Form::file('logo',['class'=>'form-control','style'=>'width :100%', 'id' => 'logo', 'style'=>'display:none', 'onchange' => 'after_logo_select()']) !!}
                        <div class="input-group">
                            <input type="text" class="form-control" aria-describedby="basic-addon2" id="logo-duplicate" readonly @if(isset($Empresa)) value="{{$Empresa->logo}}" @endif")>
                            <span class="input-group-addon btn @if(!isset($Empresa)) disabled disabled_advanced @endif" data-toggle="popover" id="toggle_popover"><i class="fa fa-eye"></i></span>
                            <span class="input-group-addon btn" id="basic-addon2" onclick="document.getElementById('logo').click()"><i class="fa fa-plus"></i></span>
                        </div>
                    </div> 
                </div><!-- /.form-group -->
            </div>
        </div> <!-- / .row-->
    </div>
    <div class='col-md-6'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="form-group @if ($errors->has('email')) has-error @endif">
                    <label class=" control-label col-md-4">
                        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                            Email
                        </span>
                    </label>

                    <div class="col-md-8">
                        {!! Form::text('email',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'email']) !!}
                    </div> 
                </div><!-- /.form-group -->
            </div>
        </div> <!-- / .row-->
        <div class='row'>
            <div class='col-md-12'>
                <div class="form-group @if ($errors->has('telefono2')) has-error @endif">
                    <label class=" control-label col-md-4">
                        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                            Tel 2
                        </span>
                    </label>

                    <div class="col-md-8">
                        {!! Form::text('telefono2',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'telefono2']) !!}
                    </div> 
                </div><!-- /.form-group -->
            </div>
        </div> <!-- / .row-->
        <div class='row'>
            <div class='col-md-12'>
                <div class="form-group @if ($errors->has('fax')) has-error @endif">
                    <label class=" control-label col-md-4">
                        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                            Fax
                        </span>
                    </label>

                    <div class="col-md-8">
                        {!! Form::text('fax',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'fax']) !!}
                    </div> 
                </div><!-- /.form-group -->
            </div>
        </div> <!-- / .row-->
    </div>
</div>
<span class='field-group-title'>Depto Compras</span>
<div class="row">
    <div class='col-md-6'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="form-group @if ($errors->has('depto_compras')) has-error @endif">
                    <label class=" control-label col-md-4">
                        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                            Contacto
                        </span>
                    </label>

                    <div class="col-md-8">
                        {!! Form::text('depto_compras',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'depto_compras']) !!}
                    </div> 
                </div><!-- /.form-group -->
            </div>
        </div> <!-- / .row-->
    </div>
    <div class='col-md-6'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="form-group @if ($errors->has('depto_compras_email')) has-error @endif">
                    <label class=" control-label col-md-4">
                        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                            Email
                        </span>
                    </label>

                    <div class="col-md-8">
                        {!! Form::text('depto_compras_email',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'depto_compras_email']) !!}
                    </div> 
                </div><!-- /.form-group -->
            </div>
        </div> <!-- / .row-->
    </div>
</div>
<span class='field-group-title'>Depto Contabilidad</span>
<div class="row">
    <div class='col-md-6'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="form-group @if ($errors->has('depto_contabilidad')) has-error @endif">
                    <label class=" control-label col-md-4">
                        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                            Contacto
                        </span>
                    </label>

                    <div class="col-md-8">
                        {!! Form::text('depto_contabilidad',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'depto_contabilidad']) !!}
                    </div> 
                </div><!-- /.form-group -->
            </div>
        </div> <!-- / .row-->
    </div>
    <div class='col-md-6'>
        <div class='row'>
            <div class='col-md-12'>
                <div class="form-group @if ($errors->has('depto_contabilidad_email')) has-error @endif">
                    <label class="control-label col-md-4">
                        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                            Email
                        </span>
                    </label>

                    <div class="col-md-8">
                        {!! Form::text('depto_contabilidad_email',null,['class'=>'form-control','style'=>'width :100%', 'id' => 'depto_contabilidad_email']) !!}
                    </div> 
                </div><!-- /.form-group -->
            </div>
        </div> <!-- / .row-->
    </div>
</div>
<div id="logo_popover" style="display:none">
    <div id="logo_popover_content">
        @if(isset($Empresa))
        <img src="{{config('cuentascorporativas.uploads_url') . $Empresa->logo}}" class="img-thumbnail" alt="Cinque Terre" width="304" height="236" id="logo_popover_img">
        @else
        <p id="logo_popover_placeholder">No logo has been selected yet</p>
        @endif
    </div>
</div>
