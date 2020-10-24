<aside class="main-sidebar elevation-4 sidebar-dark-warning">
    <!-- Brand Logo -->
    <a href="{{ URL('/dashboard') }}" class="brand-link">
        <img src="{{ asset('images/logo.png') }}" alt="AdminLTE Logo"
             class="brand-image elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Starter v5.8</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @if(is_null(Auth::user()->profilepic) or empty(Auth::user()->profilepic))
                <div class="image">
                    <img src="{{ asset('img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name}}</a>
                </div>
            @else
                <img src="{{ asset("/profilepics/". Auth::user()->profilepic) }}" class="img-circle elevation-2"
                     alt="User Image">
                <div class="info">
                    <a href="#" class="d-block">{{ Auth::user()->name}}</a>
                </div>
            @endif
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ URL('dashboard') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>

                        <p>
                            Dashboard
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview menu-open">

                <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            User Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @can('show-user')
                        <li class="nav-item">
                            <a href="{{ route('user-management.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Users</p>
                            </a>
                        </li>
                        @endcan
                        @can('show-role')
                        <li class="nav-item">
                            <a href="{{ route('role-management.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Roles</p>
                            </a>
                        </li>
                        @endcan
                        @can('show-permission')
                        <li class="nav-item">
                            <a href="{{ route('permission-management.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Permissions</p>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a href="{{ route('profile') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Manage Profile</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{url('logs')}}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Log View
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>