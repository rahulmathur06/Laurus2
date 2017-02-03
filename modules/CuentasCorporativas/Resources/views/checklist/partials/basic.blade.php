<style type="text/css">
.check_sign {
    padding-top: 29px;
}
</style>
<fieldset>
   
    <!--    <legend></legend>-->
    <div class="row">
        <div class="col-md-9">
            <div class="form-group @if ($errors->has('documento')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Nombre del automóvil. Caracteres invalidos ·$%&/()=?">
                       Nombre del Documento
                    </span>
                </label>
                {!! Form::text('documento',null,['class' => 'form-control','id' => 'documento']) !!}
            </div><!-- /.form-group -->
        </div>
        <div class="col-md-2 check_sign">
            <label>
                <input value="1" type="checkbox" class="minimal" name="requerido" @if(isset($checklist)) @if($checklist->requerido == 1)checked="" @endif @else checked="" @endif>
                Requerido
            </label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="form-group @if ($errors->has('tipo_persona_id')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire ciudad">
                        Tipo de Persona
                    </span>
                </label>
                {!! Form::select('tipo_persona_id',$tipo_person,null,['id'=>'tipo_persona_id','class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%']) !!}
            </div><!-- /.form-group -->
        </div>
        <div class="col-md-3">
            <div class="form-group @if ($errors->has('tipo_convenio_id')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                         Tipo de Convenio
                    </span>
                </label>
                <div id="tipo_convention">
                {!! Form::select('tipo_convenio_id',$tipo_convention,null,['class'=>'form-control select2 select2-hidden-accessible','style'=>'width :100%', 'id' => 'tipo_convenio_id']) !!}
                </div>
            </div><!-- /.form-group -->
        </div>

         <div class="col-md-3">
            <div class="form-group @if ($errors->has('orden')) has-error @endif">
                <label class="required control-label  ">
                    <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Tipo de aire acondicionado">
                        Orden
                    </span>
                </label>
                <div id="orden">
                     {!! Form::number('orden',null,['class' => 'form-control','id' => 'sort_order', 'required' => false]) !!}
                </div>
            </div><!-- /.form-group -->
        </div>
        <div class="col-md-2 check_sign">
            <label>
                <input  value="1" type="checkbox" class="minimal" name="validar_fecha" @if(isset($checklist))  @if($checklist->validar_fecha == 1)checked="" @endif @else checked="" @endif>
                Validar Vigencia
            </label>
        </div>
   
    </div><!-- /.row -->
   

</fieldset>