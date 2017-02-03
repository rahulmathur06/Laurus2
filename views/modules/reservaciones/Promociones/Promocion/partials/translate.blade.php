<div class="col-md-6">
    <div class="form-group @if ($errors->has('nombre')) has-error @endif">
        {!! Form::label('nombre','Nombre *') !!}
        {!! Form::text('nombre',null,['class' => 'form-control','id' => 'nombre']) !!}

    </div><!-- /.form-group -->
    <div class="form-group @if ($errors->has('titulo_destino')) has-error @endif">
        {!! Form::label('titulo_destino','Tìtulo de destino*') !!}
        {!! Form::text('titulo_destino',null,['class' => 'form-control','id' => 'titulo_destino']) !!}

    </div><!-- /.form-group -->
    <div class="form-group @if ($errors->has('url_banner_home')) has-error @endif">
        {!! Form::label('url_banner_home','URL banner home *') !!}
        {!! Form::text('url_banner_home',null,['class' => 'form-control','id' => 'url_home']) !!}
    </div><!-- /.form-group -->
    <div class="form-group @if ($errors->has('url_banner_locacion')) has-error @endif">
        {!! Form::label('url_banner_locacion','URL banner Locación *') !!}
        {!! Form::text('url_banner_locacion',null,['class' => 'form-control','id' => 'url_locacion']) !!}
    </div><!-- /.form-group -->

    <div class="form-group"@if ($errors->has('contenido')) has-error @endif>
        {!! Form::label('contenido','Contenido *') !!}
        {!! Form::textarea('contenido', null, ['style'=>'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
    </div>


</div><!-- /.col  -->

<div class="col-md-6">
    <div class="form-group @if ($errors->has('intro')) has-error @endif">
        {!! Form::label('intro','Intro *') !!}
        {!! Form::text('intro',null,['class' => 'form-control','id' => 'intro']) !!}
    </div><!-- /.form-group -->
    <div class="form-group @if ($errors->has('url')) has-error @endif">
        {!! Form::label('url','URL *') !!}
        {!! Form::text('url',null,['class' => 'form-control','id' => 'url']) !!}
    </div><!-- /.form-group -->
    <div class="form-group @if ($errors->has('url_banner')) has-error @endif">
        {!! Form::label('url_banner','URL banner *') !!}
        {!! Form::text('url_banner',null,['class' => 'form-control','id' => 'url_banner']) !!}
    </div><!-- /.form-group -->
    <div class="form-group @if ($errors->has('url_blast')) has-error @endif">
        {!! Form::label('url_blast','URL blast *') !!}
        {!! Form::text('url_blast',null,['class' => 'form-control','id' => 'url_blast']) !!}
    </div><!-- /.form-group -->
    <div class="form-group"@if ($errors->has('restricciones')) has-error @endif>
        {!! Form::label('restricciones','Restricciones *') !!}
        {!! Form::textarea('restricciones', null, ['style'=>'width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
    
    </div>
</div>


