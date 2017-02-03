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
    <div class="col-md-12">
        <div class="form-group @if ($errors->has('clave')) has-error @endif">
            <label class="required control-label  ">
                <span>
                    NUM. DE TEMPORADAS
                </span>
            </label>
            {!! Form::select('num_temp', ['1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'], count($temps),['id'=>'num_temp','class' => 'form-control']) !!}
        </div>
    </div>
    <div class="col-md-12"> 
        <table id="table" class="table table-hover task-table">
            <thead>
                <tr>
                    <th>NOMBRE TEMPORADA</th>
                    <th>FECHA INICIO</th>
                    <th>FECHA FIN</th>
                    <th>TARIFA A APLICAR</th>
                </tr>
            </thead>
            <tbody>
                {!! $selected = ''; !!}
                @if(count($temps))
                    @foreach($temps as $key=>$temp)
                    <?php $selected .= '#picker_'.($key+1).','; ?>
                    <tr>
                        <td>{!! Form::text('temp['.$key.'][nombre_temporada]',$temp->nombre_temporada,['id'=>'nombre_temporada','class' => 'form-control']) !!}</td>
                        <td>{!! Form::text('temp['.$key.'][fecha_inicio]',$temp->fecha_inicio,['id'=>'picker_'.($key+1),'class' => 'form-control jQueryUIDatepicker']) !!}</td>
                        <td>{!! Form::text('temp['.$key.'][fecha_fin]',$temp->fecha_fin,['id'=>'picker_'.($key+1).'_after','class' => 'form-control jQueryUIDatepickerwithFutureDate']) !!}</td>
                        <td>{!! Form::select('temp['.$key.'][precio_rack_id]', $tarifa_base, $temp->precio_rack_id,['id'=>'precio_rack_id','class' => 'form-control']) !!}</td>
                    </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</div>

<script>
    jQuery(document).ready(function () {
        @if(count($temps)<=0)
        jQuery('#table tbody').html(getHTML('picker_1'));
        initDatePicker('#picker_1');
        @else
        initDatePicker('{!!rtrim($selected,',')!!}');
        @endif
        jQuery('#num_temp').change(function () {
            var num_temp = jQuery(this).val();
            var html_all = '';
            var selector = '';
            if (num_temp > 0) {
                //jQuery('#table').find('tr:gt(1)').remove();
                for (var i = 0; i < num_temp; i++) { 
                    html_all += getHTML('picker_'+(i+1),i);
                    selector += '#picker_'+(i+1) + ',';
                }
                jQuery('#table tbody').html(html_all);
            }
            initDatePicker(selector.slice(0, -1));
        });
    });
    function initDatePicker(selector) {
        jQuery(selector).datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            yearRange: '-100:+0',
            maxDate: 0,
            onSelect: function (selected) {
                var picker = jQuery('#'+this.id+ '_after');
                picker.prop('readonly', false);
                picker.datepicker({
                    dateFormat: 'yy-mm-dd',
                    changeMonth: true,
                    changeYear: true,
                    yearRange: '-0:+100',
                });
                picker.datepicker('option', 'minDate', selected);
            }
        });
    }
    
    function getHTML(id,key){
        var html = '';
        
         var precio_rack_id = '<select id="rack_id" class="form-control" name="temp['+key+'][precio_rack_id]">';
        {!! $option ='';
            foreach($tarifa_base as $key=>$val){
              $option .='<option value="'.$key.'">'.$val.'</option>';  
            }
        !!}
        precio_rack_id += '{!! $option !!}';
        precio_rack_id += '</select>';
        html += '<tr class="form-group"><td><input class="form-control" name="temp['+key+'][nombre_temporada]" type="text"></td><td><input id="'+id+'" class="form-control jQueryUIDatepicker" readonly="readonly" name="temp['+key+'][fecha_inicio]" type="text"></td><td><input id="'+id+'_after" class="form-control jQueryUIDatepickerwithFutureDate" readonly="readonly" name="temp['+key+'][fecha_fin]" type="text"></td><td>'+precio_rack_id+'</td></tr>';   
        return html;
    }

</script>