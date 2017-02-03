<fieldset>
    <legend>Imagenes</legend>
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('imagen_chica')) has-error @endif">
            <label class="required control-label  ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Imagen chica del automóvil">
                    Imagen chica
                 </span>
            </label>

            {!! Form::file('imagen_chica',null,['class' => 'form-control','id' => 'imagen_chica']) !!}

        </div><!-- /.form-group -->

    </div><!-- /.col -->

    <div class="col-md-4">
        <div class="form-group @if ($errors->has('imagen')) has-error @endif">
            <label class="required control-label  ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Imagen del automóvil">
                    Imagen
                 </span>
            </label>

            {!! Form::file('imagen',null,['class' => 'form-control','id' => 'imagen']) !!}

        </div><!-- /.form-group -->

    </div><!-- /.col -->
    <div class="col-md-4">
        <div class="form-group @if ($errors->has('img_carousel')) has-error @endif">
            <label class="required control-label  ">
                 <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Imagen carousel del automóvil">
                    Imagen carousel
                 </span>
            </label>

            {!! Form::file('img_carousel',null,['class' => 'form-control','id' => 'img_carousel']) !!}

        </div><!-- /.form-group -->
    </div>

</fieldset>