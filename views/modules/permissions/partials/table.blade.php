@foreach($modules as $module)
    <div class="col-md-6">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">{{ $module['module_name']}}</h3>
            </div><!-- /.box-header -->
            <div class="box-body no-padding">                    
                    @if(count($module['menus']) === 0)
                    <table class="table table-striped">
                        <tr>
                        <th>Display name</th>
                        <th>Acción</th>
                        </tr>
                        @foreach($module['permissions'] as $action)
                            @if(isset($roles->permissions[$action['permission']]))
                                <?php $value = $roles->permissions[$action['permission']]; ?>
                            @else
                                <?php $value = 0; ?>
                            @endif
                            <tr>
                                <td> {{ $action['display_name'] }} </td>
                                <td>
                                    <label>
                                        <input
                                            value="{{$action['permission']}}"
                                            type="checkbox"
                                            class="minimal permission"
                                            {{ ($value == 1)? 'checked': '' }}>
                                    </label>
                                </td>
                            </tr>
                        @endforeach
                       </table>
                    @else
                    <div class="container-fluid permission-container">
                        @foreach($module['menus'] as $menu)
                        <div class="row">
                            <div class="col-md-6">
                                <div class="menu-title"><strong>Menu {{$menu['nombre']}}</strong>
                                </div>
                            </div>
                            <div class="col-md-6 center">
                                {!!Form::checkbox('select_menu', 1, false, ['onclick' => 'select_all('.$menu['id'].', this.checked)', 'id' => $menu['id'], 'class' => 'select_menu'])!!} SELECCIONAR TODOS
                            </div>
                        </div>
                        <div class="container-fluid menu-permissions">
                            <div class="row heading-row">
                                <div class="col-md-6">Display name</div>
                                <div class="col-md-6 center">Acción</div>
                            </div>
                        
                            @foreach($menu['permissions'] as $action)
                                @if(isset($roles->permissions[$action['permission']]))
                                    <?php $value = $roles->permissions[$action['permission']]; ?>
                                @else
                                    <?php $value = 0; ?>
                                @endif
                                <div class="row">
                                    <div class="col-md-6"> {{ $action['display_name'] }} </div>
                                    <div class="col-md-6 center">
                                        <label>
                                            <input
                                                value="{{$action['permission']}}"
                                                type="checkbox"
                                                class="minimal permission checkbox_{{$menu['id']}}"
                                                {{ ($value == 1)? 'checked': '' }}>
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        @endforeach
                    </div>
                    @endif
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
@endforeach