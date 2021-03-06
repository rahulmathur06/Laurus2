<div class="row detail_corp scrollable">
    <div class="details_title"><strong>Seleccione los tipos de persona que pueden utilizar esta tarifa en convenios corporativos</strong></div>
    <div class="col-md-12">
       <label class="checkbox-inline">
                {!! Form::checkbox('select_all', 1, false, ['id' => 'select_all', 'onclick' => "jQuery('#person_types input').prop('checked', this.checked)"]) !!} <span class="checkbox-text"> SELECCIONAR TODO</span>
       </label>
    </div>
    <div class="col-md-11 col-md-offset-1 margintop-5" id="person_types">
        @foreach($tipo_personas as $id => $tipo_persona)
        <label class="db">
                {!! Form::checkbox('personas['.$id.']', 1, in_array($id, $details)) !!} <span class="checkbox-text"> {{$tipo_persona}}</span>
       </label>
        @endforeach
    </div> 
</div>