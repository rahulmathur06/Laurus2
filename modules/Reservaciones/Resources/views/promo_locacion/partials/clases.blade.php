<div class="row">
    <div class="col-md-12">
        <div class="select_all">{!! Form::checkbox('select_all', 1, false, ['id' => 'select_all', 'onclick' => 'jQuery(".clases").prop("checked", this.checked)']) !!} <span class="checkbox-text"> SELECCIONAR TODOS</span></div>
        <div class="clases-container">
            @foreach($clases as $id => $nombre)
            <div class="clase-checkbox">
                @if(in_array($id, $promo_locacion_clases))
                {!! Form::checkbox('clases[]', $id , true, ['class' => 'clases', 'id' => $id]) !!} <span class="checkbox-text"> {{$nombre}}</span>
                @else
                {!! Form::checkbox('clases[]', $id , false, ['class' => 'clases', 'id' => $id]) !!} <span class="checkbox-text"> {{$nombre}}</span>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</div>
