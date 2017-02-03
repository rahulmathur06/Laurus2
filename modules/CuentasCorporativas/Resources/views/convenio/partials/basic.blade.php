<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="required control-label  ">
                <span>Filio</span>
            </label>
            {!! Form::text('id',null,['id'=>'filio','class' => 'form-control','readonly']) !!}
            {!! Form::hidden('tipo_convenio',2) !!}
            
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="control-label">
                <span>Status</span>
            </label>
            {!! Form::text('status','Pendiente',['id'=>'status','class' => 'form-control','readonly']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="required control-label  ">
                <span>Cliente</span>
            </label>
            {!! Form::select('empresa_id',$empresas,null,['id'=>'empresa_id','class' => 'form-control','onChange' => 'getDetails(this.value)']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="required control-label  ">
                <span>Descripción del Convenio</span>
            </label>
            {!! Form::text('convenio_descripcion',null,['id'=>'convenio_descripcion','class' => 'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="required control-label  ">
                <span>Duración</span>
            </label>
            {!! Form::select('duracion',[12=>12,24=>24,36=>36],null,['id'=>'duracion','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="required control-label  ">
                <span>TARIFA ASIGNADA</span>
            </label>
            {!! Form::select('tarifa_id',$tarifa,null,['id'=>'tarifa_id','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="required control-label  ">
                <span>DESCRIPCION DE LOS SEGUROS</span>
            </label>
            {!! Form::select('seguro_id',$catalogo,null,['id'=>'seguro_id','class' => 'form-control']) !!}
            {!! Form::hidden('id',null,['id'=>'convenios_id']) !!}
        </div>
    </div>
</div>
<div class="row">
    <label class="control-label">
        <span>Checklist</span>
    </label>
</div>
<div class="check_list">
 @if(count($convenio_chklist)>0)
@foreach($convenio_chklist as $key=>$val)
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="checkbox-inline ">
            {!! Form::checkbox('checklist['.$key.'][id]',$val['checklist_id'],['id'=>'checklist_id']) !!}<span class="checkbox-text"> {!!$val['documento']!!}</span>
            </label>
            {!! Form::hidden('checklist['.$key.'][required]',$val['requerido']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="control-label @if(!empty($val['requerido'])) required @endif ">
                <span>Vigencia</span>
            </label>
            {!! Form::text('checklist['.$key.'][vigencia]',$val['vigencia'],['id'=>'vigencia','class' => 'form-control']) !!}
            
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class=" control-label  ">
            </label>
            {!! Form::file('checklist['.$key.'][nomarchivo]',['id'=>'nomarchivo']) !!}
            @if(isset($val['nomarchivo'])) {!! Form::text('checklist['.$key.'][nomarchivo_old]',$val['nomarchivo'],['id'=>'nomarchivo_old','readonly']) !!} @endif
        </div>
    </div>
</div>
@endforeach
@endif
</div>
<script src="{{ asset ('bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
<script type="text/javascript">
 function getDetails() {
        var empresa_id = $('#empresa_id').val();
        var data = {empresa_id: empresa_id};
        $.ajax({
            url: "{!! URL::to('/convenios/getDetail') !!}",
            type: 'post',
            data: data,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                jQuery('.check_list').html(response);
            },
            error: function (error) {
                console.log(error.responseText);
            }
        });
    };
    @if(count($convenio_chklist)==0)
    getDetails();
    @endif
</script>
    