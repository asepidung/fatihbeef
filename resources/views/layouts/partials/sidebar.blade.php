<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/dashboard') }}" class="brand-link">
        <img src="{{ asset('adminlte/dist/img/logo.png') }}" alt="Logo" class="brand-image img-circle elevation-3">
        <span class="brand-text font-weight-light">Fatih Beef</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <span class="img-circle text-light"><i class="fas fa-user-tie"></i></span> -->
            </div>
            <div class="info">
                @if(Auth::check())
                <a href="#" class="d-block">{{ Auth::user()->username }}</a>
                @else
                <a href="#" class="d-block">Guest</a>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if(Auth::user()->isAdmin())
                <li class="nav-item">
                    <a href="{{ route('manage.users') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Manajemen Pengguna</p>
                    </a>
                </li>
                @endif
                <li class="nav-item">
                    <a href="{{ url('/pelanggan') }}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>pelanggan</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>