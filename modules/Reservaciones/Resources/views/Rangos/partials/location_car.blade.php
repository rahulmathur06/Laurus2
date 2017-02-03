@if(count($claseID)>0)
<div class="col-md-12 form-group @if ($errors->has('categoria_id')) has-error @endif">
    <div class="col-lg-4">
    <label class="  required ">
        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Categoria a la que va asignada la clase">
           Clase
        </span>
    </label>
</div>
   <div class="col-lg-2">
     <label class="  required ">
        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Categoria a la que va asignada la clase">
            Pricio Minio
        </span>
    </label>
</div>
   <div class="col-lg-2">
     <label class="  required ">
        <span  data-toggle="tooltip" data-html="true" title="" data-original-title="Categoria a la que va asignada la clase">
           Pricio Maximo
        </span>
    </label>
</div>
</div><!-- /.form-group  -->

    @foreach($claseID as $list )
    <div class="row col-md-12 ">
        <div class="col-lg-4">
            {!! Form::text('autos_clases_id['.$list->clase_id.']', $list->nombre,['readonly' => 'readonly','class' => 'form-control','id' => 'autos_clases_id']) !!}
        </div>
         <div class="col-lg-2">
            {!! Form::text('min_precio['.$list->clase_id.']',(isset($list->min_precio)) ? $list->min_precio : null,['class' => 'numbers form-control','id' => 'min_precio']) !!}
        </div>
         <div class="col-lg-2">
            {!! Form::text('max_precio['.$list->clase_id.']',(isset($list->max_precio)) ? $list->max_precio : null,['class' => 'numbers form-control','id' => 'max_precio']) !!}
        </div>
    </div><br><br><br>
    @endforeach
@else
 <div class="row col-md-12 " style="margin-left:20px;">
No Autos found
</div>
@endif
<script type="text/javascript">
$(function(){
   var count =  {!! count($claseID)  !!};
   if(count==0){
       $('#action_btn').hide();
   }else{
       $('#action_btn').show();
   }
  $('.numbers').keypress(function(e) {
    if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;
  })
  .on("cut copy paste",function(e){
    e.preventDefault();
  });

});
</script>