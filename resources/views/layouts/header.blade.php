<!-- Navbar -->
<nav class="main-header navbar navbar-expand border-bottom navbar-light navbar-warning">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ url('dashboard') }}" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link">Documentation</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link">Help</a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    {{--<form class="form-inline ml-3">--}}
    {{--<div class="input-group input-group-sm">--}}
    {{--<input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
    {{--<div class="input-group-append">--}}
    {{--<button class="btn btn-navbar" type="submit">--}}
    {{--<i class="fas fa-search"></i>--}}
    {{--</button>--}}
    {{--</div>--}}
    {{--</div>--}}
    {{--</form>--}}

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        {{--<!-- Messages Dropdown Menu -->--}}
        {{--<li class="nav-item dropdown">--}}
        {{--<a class="nav-link" data-toggle="dropdown" href="#">--}}
        {{--<i class="far fa-comments"></i>--}}
        {{--<span class="badge badge-danger navbar-badge">3</span>--}}
        {{--</a>--}}
        {{--<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
        {{--<a href="#" class="dropdown-item">--}}
        {{--<!-- Message Start -->--}}
        {{--<div class="media">--}}
        {{--<img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">--}}
        {{--<div class="media-body">--}}
        {{--<h3 class="dropdown-item-title">--}}
        {{--Brad Diesel--}}
        {{--<span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>--}}
        {{--</h3>--}}
        {{--<p class="text-sm">Call me whenever you can...</p>--}}
        {{--<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- Message End -->--}}
        {{--</a>--}}
        {{--<div class="dropdown-divider"></div>--}}
        {{--<a href="#" class="dropdown-item">--}}
        {{--<!-- Message Start -->--}}
        {{--<div class="media">--}}
        {{--<img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
        {{--<div class="media-body">--}}
        {{--<h3 class="dropdown-item-title">--}}
        {{--John Pierce--}}
        {{--<span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>--}}
        {{--</h3>--}}
        {{--<p class="text-sm">I got your message bro</p>--}}
        {{--<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- Message End -->--}}
        {{--</a>--}}
        {{--<div class="dropdown-divider"></div>--}}
        {{--<a href="#" class="dropdown-item">--}}
        {{--<!-- Message Start -->--}}
        {{--<div class="media">--}}
        {{--<img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">--}}
        {{--<div class="media-body">--}}
        {{--<h3 class="dropdown-item-title">--}}
        {{--Nora Silvester--}}
        {{--<span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>--}}
        {{--</h3>--}}
        {{--<p class="text-sm">The subject goes here</p>--}}
        {{--<p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<!-- Message End -->--}}
        {{--</a>--}}
        {{--<div class="dropdown-divider"></div>--}}
        {{--<a href="#" class="dropdown-item dropdown-footer">See All Messages</a>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--<!-- Notifications Dropdown Menu -->--}}
        {{--<li class="nav-item dropdown">--}}
        {{--<a class="nav-link" data-toggle="dropdown" href="#">--}}
        {{--<i class="far fa-bell"></i>--}}
        {{--<span class="badge badge-warning navbar-badge">15</span>--}}
        {{--</a>--}}
        {{--<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">--}}
        {{--<span class="dropdown-item dropdown-header">15 Notifications</span>--}}
        {{--<div class="dropdown-divider"></div>--}}
        {{--<a href="#" class="dropdown-item">--}}
        {{--<i class="fas fa-envelope mr-2"></i> 4 new messages--}}
        {{--<span class="float-right text-muted text-sm">3 mins</span>--}}
        {{--</a>--}}
        {{--<div class="dropdown-divider"></div>--}}
        {{--<a href="#" class="dropdown-item">--}}
        {{--<i class="fas fa-users mr-2"></i> 8 friend requests--}}
        {{--<span class="float-right text-muted text-sm">12 hours</span>--}}
        {{--</a>--}}
        {{--<div class="dropdown-divider"></div>--}}
        {{--<a href="#" class="dropdown-item">--}}
        {{--<i class="fas fa-file mr-2"></i> 3 new reports--}}
        {{--<span class="float-right text-muted text-sm">2 days</span>--}}
        {{--</a>--}}
        {{--<div class="dropdown-divider"></div>--}}
        {{--<a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>--}}
        {{--</div>--}}
        {{--</li>--}}
        {{--<!-- Authentication Links -->--}}
        @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
        @else
            {{--<li class="nav-item dropdown">--}}
            {{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
            {{--{{ Auth::user()->name }} <span class="caret"></span>--}}
            {{--</a>--}}

            {{--<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
            {{--<a class="dropdown-item" href="{{ route('logout') }}"--}}
            {{--onclick="event.preventDefault();--}}
            {{--document.getElementById('logout-form').submit();">--}}
            {{--{{ __('Logout') }}--}}
            {{--</a>--}}

            <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                @csrf
            </form>
            {{--</div>--}}
            {{--</li>--}}
            <!-- Menu Toggle Button -->
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            @if(is_null(Auth::user()->profilepic) or empty(Auth::user()->profilepic))
                                <img src="{{ asset("/img/avatar.png") }}" class="user-image" alt="User Image">
                            @else
                                <img src="{{ asset("/profilepics/". Auth::user()->profilepic) }}" class="user-image"
                                     alt="User Image">
                                @endif
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                @if(is_null(Auth::user()->profilepic) or empty(Auth::user()->profilepic))
                                    <img src="{{ asset("/img/avatar.png") }}" class="user-image" alt="User Image">
                                @else
                                    <img src="{{ asset("/profilepics/". Auth::user()->profilepic) }}" class="user-image"
                                         alt="User Image">
                                @endif
                                <p>
                                    Hello {{ Auth::user()->name }}
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                @if (Auth::guest())
                                    <div class="pull-left">
                                        <a href="{{ route('login') }}" class="btn btn-default btn-flat">Login</a>
                                    </div>
                                @else
                                    <div class="col-md-12">
                                        {{--<div class="col-md-3 pull-left">--}}

                                        {{--<a href="{{ url('profile') }}"--}}
                                        {{--class="btn btn-default btn-flat">Profile</a>--}}

                                        {{--</div>--}}
                                        <div class="btn-group">
                                            <div class="pull-left">
                                                <a href="{{ route('profile') }}" class="btn btn-outline-secondary bg-gradient-warning">Profile</a>
                                            </div>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <div class="pull-right">
                                                <a class="btn btn-outline-secondary bg-gradient-danger" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            @endguest
    </ul>
</nav>
<!-- /.navbar -->