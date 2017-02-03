@if(count($checklist)>0)
@foreach($checklist as $key=>$val)
<div class="row">
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="checkbox-inline ">
            {!! Form::checkbox('checklist['.$key.'][id]',$val['id'],null,['id'=>'tax_factor','class' => '']) !!}<span class="checkbox-text"> {!!$val['documento']!!}</span>
            </label>
            {!! Form::hidden('checklist['.$key.'][required]',$val['requerido']) !!}
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="control-label @if(!empty($val['requerido'])) required @endif ">
                <span>Vigencia</span>
            </label>
            {!! Form::text('checklist['.$key.'][vigencia]',null,['id'=>'vigencia','class' => 'form-control']) !!}
            
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class=" control-label  ">
            </label>
            {!! Form::file('checklist['.$key.'][nomarchivo]',['id'=>'nomarchivo']) !!}
        </div>
    </div>
</div>
@endforeach
@endif