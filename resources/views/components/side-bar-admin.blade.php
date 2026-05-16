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
    <li class="nav-item {{ Nav::isRoute('dashboard') }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

    <!-- Heading -->
    @if($tips_and_trick)

    <li class="nav-item my-0">
        <a class="nav-link py-2 @cannot('langganan') disabled @endcannot" href="{{ route('category', $tips_link) }}" target="_blank">
            <i class="fas fa-clipboard-list"></i>
            <span>Tips & Trick</span> 
            @can('member') <i class="fas fa-lock"></i>  @endcan	
        </a>
    </li>

    @endif

    @if(count($psikotes) > 0 || $is_full_access > 0)


        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
        {{ __('PSIKOTES') }}
        </div>

        @foreach ($psikotes as $row)

        <li class="nav-item my-0">
            <a class="nav-link py-2" href="{{ route('member.soal.type', $row->id) }}">
                <i class="fas fa-clipboard-list"></i>
                <span>{{ $row->name }}</span>
            </a>
        </li>
            
        @endforeach  

    @endif

    @if(count($akademik) > 0 || $is_full_access > 0)

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
        {{ __('AKADEMIK') }}
        </div>

        @foreach ($akademik as $row)

        <li class="nav-item my-0">
            <a class="nav-link py-2" href="{{ route('member.soal.type', $row->id) }}">
                <i class="fas fa-clipboard-list"></i>
                <span>{{ $row->name }}</span>
            </a>
        </li>
            
        @endforeach  

    @endif



    @if(count($pengembangan) > 0 || $is_full_access > 0)

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
        {{ __('PENGEMBANGAN') }}
        </div>

        @foreach ($pengembangan as $row)

        <li class="nav-item my-0">
            <a class="nav-link py-2" href="{{ route('member.soal.type', $row->id) }}">
                <i class="fas fa-clipboard-list"></i>
                <span>{{ $row->name }}</span>
            </a>
        </li>
            
        @endforeach  

    @endif

  

    @if( $test_iq_access || auth()->user()->can('admin') )    


    <!-- Nav Item - List Norma Test -->
    
    <li class="nav-item {{ Nav::isRoute('norma.test.welcome') }}">
        <a class="nav-link py-2" href="{{ route('norma.test.welcome') }}">
            {{-- <i class="fas fa-fw fa-user"></i> --}}
            <i class="fas fa-list"></i>
            <span>{{ __('Test IQ') }}</span>
        </a>
    </li>

    @endif



    @can('admin')
    <li class="nav-item {{ Nav::isRoute('norma.quiz.dashboard') }}">
        <a class="nav-link py-2" href="{{ route('norma.quiz.dashboard') }}">
            {{-- <i class="fas fa-fw fa-user"></i> --}}
            <i class="fas fa-list"></i>
            <span>{{ __('Bank Soal ') }}</span>
        </a>
    </li>
    <li class="nav-item {{ Nav::isRoute('norma.report.rekap') }}">
        <a class="nav-link py-2" href="{{ route('norma.report.rekap') }}"> 
            {{-- <i class="fas fa-fw fa-user"></i> --}}
            <i class="fas fa-list"></i>
            <span>{{ __('Hasil') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('generate-user') }}">
        <a class="nav-link py-2" href="{{ route('generate-user') }}">
            {{-- <i class="fas fa-fw fa-user"></i> --}}
            <i class="fas fa-list"></i>
            <span>Generate User</span>
        </a>
    </li>            

    <!-- Nav Item - About -->
    <li class="nav-item {{ Nav::isRoute('admin.users') }}">
        <a class="nav-link py-2" href="{{ route('admin.users') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>{{ __('Users') }}</span>
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