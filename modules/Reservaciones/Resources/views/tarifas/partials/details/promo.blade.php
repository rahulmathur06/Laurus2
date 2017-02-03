@if(count($tarifa_base)<=0)
<div class="row">
    <div class="col-md-12">Por favor crea una tarifa Rack previamente.</div>
</div>
<script type="text/javascript">
jQuery(document).ready(function () {
    jQuery('#enviar').hide();
});
</script>
<?php die; ?>
@endif
<div class="row detail_corp scrollable">
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="required control-label  ">
                <span>
                  FACTOR DE PROMOCION
                </span>
                (EJ 23.21%)
            </label>
            @if(isset($promo->factor_promo))
            {!! Form::text('factor_promo',$promo->factor_promo,['id'=>'factor_promo','class' => 'form-control']) !!}
            @else
            {!! Form::text('factor_promo',null,['id'=>'factor_promo','class' => 'form-control']) !!}
            @endif
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
                <label class="required control-label  ">
                    <span>
                        TIP0 DE PROMOCION
                    </span>
                </label>
            @if(isset($promo->tipo_factor))
            {!! Form::select('tipo_factor', ['-' => 'DESCUENTO(-)', '+' => 'DESCUENTO(+)'], $promo->tipo_factor,['id'=>'tipo_factor','class' => 'form-control']) !!}
            @else
            {!! Form::select('tipo_factor', ['-' => 'DESCUENTO(-)', '+' => 'DESCUENTO(+)'], null,['id'=>'tipo_factor','class' => 'form-control']) !!}
            @endif
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
                <label class="required control-label  ">
                    <span>
                        FECHA INICIO
                    </span>
                </label>
                @if(isset($promo->fecha_inicio))
                {!! Form::text('fecha_inicio',$promo->fecha_inicio,['id'=>'fecha_inicio','class' => 'form-control jQueryUIDatepicker','readonly']) !!}
                @else 
                {!! Form::text('fecha_inicio',null,['id'=>'fecha_inicio','class' => 'form-control jQueryUIDatepicker','readonly']) !!}
                @endif
            </div>
    </div>
    <div class="col-md-6">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
                <label class="required control-label  ">
                    <span>
                        FECHA FIN
                    </span>
                </label>
                @if(isset($promo->fecha_fin))
                {!! Form::text('fecha_fin',$promo->fecha_fin,['id'=>'fecha_fin','class' => 'form-control jQueryUIDatepickerwithFutureDate', 'readonly']) !!}
                @else 
                {!! Form::text('fecha_fin',null,['id'=>'fecha_fin','class' => 'form-control jQueryUIDatepickerwithFutureDate', 'readonly']) !!}
                @endif
            </div>
    </div>
    <div class="col-md-12">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
                <label class="required control-label  ">
                    <span>
                        TARIFA A APLICAR
                    </span>
                </label>
                @if(isset($promo->precio_rack_id))
                {!! Form::select('precio_rack_id', $tarifa_base, $promo->precio_rack_id,['id'=>'rack_id','class' => 'form-control']) !!}
                @else 
                {!! Form::select('precio_rack_id', $tarifa_base, null,['id'=>'rack_id','class' => 'form-control']) !!}
                @endif
            </div>
    </div>
</div>

<script>
  jQuery(document).ready(function () { 
        jQuery(".jQueryUIDatepicker").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            maxDate: 0,
            onSelect: function (selected) {
                var picker = jQuery(".jQueryUIDatepickerwithFutureDate");
                picker.prop('readonly', false);
                picker.datepicker({
                    dateFormat: "yy-mm-dd",
                    changeMonth: true,
                    changeYear: true,
                    yearRange: "-0:+100",
                });
                picker.datepicker("option", "minDate", selected);
            }
        });

    });  
</script>
