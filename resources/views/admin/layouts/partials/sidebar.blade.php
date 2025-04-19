<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link" style="text-align: center">
        <span class="brand-text font-weight-light"><strong>Eagle</strong> Golf Indo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset("assets/adminlte/dist/img/avatar5.png") }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : null }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">Attendance</li>
                <li class="nav-item">
                    <a href="{{ route('attendance') }}"  class="nav-link {{ Str::startsWith(Route::currentRouteName(), 'attendance') ? 'active' : '' }}">
                        <i class="nav-icon far fa-circle"></i>
                        <p>
                            Check Attendance
                        </p>
                    </a>
                </li>
                <li class="nav-header">Menu</li>
                <li class="nav-item">
                    <a href="{{ route('participant') }}" class="nav-link {{ Str::startsWith(Route::currentRouteName(), 'participant') ? 'active' : '' }}"> 
                        <i class="nav-icon far fa-user-circle"></i>
                        <p>Participant</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('category') }}" class="nav-link {{ Str::startsWith(Route::currentRouteName(), 'category') ? 'active' : '' }}">
                        <i class="nav-icon far fa-bookmark"></i>
                        <p>
                            Category
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('account') }}" class="nav-link {{ Str::startsWith(Route::currentRouteName(), 'account') ? 'active' : '' }}">
                        <i class="nav-icon far fa-user"></i>
                        <p>
                            Access
                        </p>
                    </a>
                </li>

                @if(Auth::user()->id == 1) 

                <li class="nav-item">
                    <a href="{{ route('logs') }}" class="nav-link {{ Route::currentRouteName() == 'logs' ? 'active' : null }}">
                        <i class="nav-icon far fa-file"></i>
                        <p>
                            Logs
                        </p>
                    </a>
                </li>

                @endif
                
                <li class="nav-item">

                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="nav-icon far fa-arrow-alt-circle-left"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
