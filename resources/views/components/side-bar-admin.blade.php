<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
            <img src="/img/logo.png" alt="" width="120px">
        </div>
        {{-- <div class="sidebar-brand-text mx-3">Psikotes</div> --}}
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    {{-- <li class="nav-item {{ Nav::isRoute('dashboard') }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li> --}}


    @can('admin')
    <li class="mt-3 nav-item {{ Nav::isRoute('norma.quiz.dashboard') }}">
        <a class="nav-link py-2" href="{{ route('norma.quiz.dashboard') }}">
            {{-- <i class="fas fa-fw fa-user"></i> --}}
            <i class="fas fa-list"></i>
            <span>{{ __('DB SOAL ') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('norma.report.rekap') }}">
        <a class="nav-link py-2" href="{{ route('norma.report.rekap') }}"> 
            {{-- <i class="fas fa-fw fa-user"></i> --}}
            <i class="fas fa-list"></i>
            <span>{{ __('HASIL JAWABAN') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('generate-user') }}">
        <a class="nav-link py-2" href="{{ route('generate-user') }}">
            {{-- <i class="fas fa-fw fa-user"></i> --}}
            <i class="fas fa-list"></i>
            <span>GENERATE USER</span>
        </a>
    </li>            

    <!-- Nav Item - About -->
    <li class="nav-item {{ Nav::isRoute('admin.users') }}">
        <a class="nav-link py-2" href="{{ route('admin.users') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>{{ __('USER/PENGGUNA') }}</span>
        </a>
    </li> 

    @endcan

    {{-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        {{ __('Logout') }}
    </a> --}}

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->