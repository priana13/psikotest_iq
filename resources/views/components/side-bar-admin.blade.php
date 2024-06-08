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

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('intelligence structure test') }}
    </div>        


    <!-- Nav Item - List Norma Test -->
    
    <li class="nav-item {{ Nav::isRoute('norma.test') }}">
        <a class="nav-link py-2" href="{{ route('norma.test') }}">
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
    @endcan

    <!-- Try Oute Test -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    {{ __('Tty Out') }} 
    </div>

      <li class="nav-item my-0">
        <a class="nav-link py-2" href="{{ route('admin.soal-tryout') }}">
            <i class="fas fa-clipboard-list"></i>
            <span>Soal Tryout</span> <span class="badge badge-danger rounded-pill mx-1">New</span>
        </a>
    </li>

    @if(count($tryout) > 0)



    <li class="nav-item my-0">
        <a class="nav-link py-2" href="{{ route('tryout.start') }}">
            <i class="fas fa-clipboard-list"></i>
            <span>Test Try Out</span>
        </a>
    </li>
    @endif

    @if( auth()->user()->can('admin') )

    <li class="nav-item my-0">
        <a class="nav-link py-2" href="{{ route('tryout.table') }}">
            <i class="fas fa-clipboard-list"></i>
            <span>Hasil Test</span> 
        </a>
    </li>

    @endif
        

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
    {{ __('UJIAN') }}
    </div>

    <!-- Nav Item - History -->
    <li class="nav-item my-0">
        <a class="nav-link py-2" href="{{ route('member.history') }}">
            <i class="fas fa-history"></i>
            <span>{{ __('History') }}</span>
        </a>
    </li>

    @cannot('admin')
    <!-- Nav Item - Langganan -->
    <li class="nav-item {{ Nav::isRoute('admin.memberships') }}">
        <a class="nav-link py-2" href="{{ route('admin.memberships') }}">
            <i class="fas fa-clock"></i>
            <span>{{ __('Langganan') }}</span>
        </a>
    </li>

    @endcan


    <!-- Divider -->
    <hr class="sidebar-divider">

    @can('admin')

    <!-- Heading -->
    <div class="sidebar-heading">
        {{ __('Admin') }}
    </div>

    <!-- Nav Item - List Psikotes -->
    <li class="nav-item {{ Nav::isRoute('admin.exams') }}">
        <a class="nav-link py-2" href="{{ route('admin.exams') }}">
            {{-- <i class="fas fa-fw fa-user"></i> --}}
            <i class="fas fa-list"></i>
            <span>{{ __('List Soal Tes') }}</span>
        </a>
    </li>

    <!-- Nav Item - Soal -->
    <li class="nav-item d-none {{ Nav::isRoute('admin.questions') }}">
        <a class="nav-link py-2" href="{{ route('admin.questions') }}">
            {{-- <i class="fas fa-fw fa-hands-helping"></i> --}}
            <i class="fas fa-question"></i>
            <span>{{ __('Soal') }}</span>
        </a>
    </li>

    <!-- Nav Item - Nilai -->
    <li class="nav-item d-none {{ Nav::isRoute('admin.scores') }}">
        <a class="nav-link py-2" href="{{ route('admin.scores') }}">
            <i class="fas fa-fw fa-hands-helping"></i>
            <span>{{ __('Nilai') }}</span>
        </a>
    </li>


    <li class="nav-item {{ Nav::isRoute('admin.packages') }}">
        <a class="nav-link py-2" href="{{ route('admin.packages') }}">
            {{-- <i class="fas fa-fw fa-hands-helping"></i> --}}
            <i class="fas fa-dollar-sign"></i>
            <span>{{ __('Paket Harga') }}</span>
        </a>
    </li>


    <li class="nav-item {{ Nav::isRoute('admin.transactions') }}">
        <a class="nav-link py-2" href="{{ route('admin.transactions') }}">
            {{-- <i class="fas fa-fw fa-hands-helping"></i> --}}
            <i class="fas fa-tasks"></i>
            <span>{{ __('Transaksi') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('admin.transactions') }}">
        <a class="nav-link py-2" href="{{ route('admin.offline-registrations') }}">
            {{-- <i class="fas fa-fw fa-hands-helping"></i> --}}
            <i class="fas fa-tasks"></i>
            <span>Registrasi Offline</span> <span class="badge badge-danger rounded-pill mx-1">New</span>
        </a>
    </li>


    <li class="nav-item {{ Nav::isRoute('admin.confirmations') }}">
        <a class="nav-link py-2" href="{{ route('admin.confirmations') }}">
            <i class="fas fa-envelope-open-text"></i>
            <span>{{ __('Konfirmasi') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('admin.memberships') }}">
        <a class="nav-link py-2" href="{{ route('admin.memberships') }}">
            <i class="fas fa-clock"></i>
            <span>{{ __('Langganan') }}</span>
        </a>
    </li>

    <li class="nav-item {{ Nav::isRoute('admin.posts') }}">
        <a class="nav-link py-2" href="{{ route('admin.posts') }}">
            <i class="fas fa-clipboard-list""></i>
            <span>{{ __('Pages') }}</span>
        </a>
    </li>



    <!-- Configurasi -->
    <div class="sidebar-heading mt-3">
        {{ __('Konfigurasi') }}
    </div>        


    <li class="nav-item {{ Nav::isRoute('admin.examcategory') }}">
        <a class="nav-link py-2" href="{{ route('admin.examcategory') }}">
            <i class="fas fa-money-check-alt"></i>
            <span>{{ __('Kategori Tes') }}</span>
        </a>
    </li>  


    <li class="nav-item {{ Nav::isRoute('admin.payment_methods') }}">
        <a class="nav-link py-2" href="{{ route('admin.payment_methods') }}">
            <i class="fas fa-money-check-alt"></i>
            <span>{{ __('Payment Method') }}</span>
        </a>
    </li>            

    <!-- Nav Item - About -->
    <li class="nav-item {{ Nav::isRoute('admin.users') }}">
        <a class="nav-link py-2" href="{{ route('admin.users') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>{{ __('Users') }}</span>
        </a>
    </li>

    <!-- Nav Item - Setting -->
    <li class="nav-item {{ Nav::isRoute('setting') }}">
        <a class="nav-link py-2" href="{{ route('setting') }}">
            <i class="fas fa-fw fa-cogs"></i>
            <span>{{ __('Setting') }}</span>
        </a>
    </li>


    @endcan




    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Nav Item - Profile -->
    <li class="nav-item">
        <a class="nav-link py-2" href="{{ route('myprofile') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>{{ __('My Profile') }}</span>
        </a>
    </li>

    <!-- Nav Item - Profile -->
    <li class="nav-item">
        <a class="nav-link py-2" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt"></i>
            <span>{{ __('Logout') }}</span>
        </a>
    </li>

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