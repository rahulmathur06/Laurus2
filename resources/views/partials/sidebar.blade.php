<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{url('img/users/'.$getUser->image)}}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{ $getUser->first_name." ".$getUser->last_name }}</p>
            </div>
        </div>
        {!! Menu::render('sidebar-menu') !!}
    </section><!-- /.sidebar -->
</aside><!-- /.main-sidebar -->