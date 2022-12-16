<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Laravel SB Admin 2">
    <meta name="author" content="Alejandro RH">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"> --}}

    <link href="/fontawesome5/css/fontawesome.css" rel="stylesheet">
    <link href="/fontawesome5/css/brands.css" rel="stylesheet">
    <link href="/fontawesome5/css/solid.css" rel="stylesheet">

    <link href="/fontawesome5/css/v5-font-face.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Favicon -->
    <link href="{{ asset('img/favicon.png') }}" rel="icon" type="image/png">
    


    @livewireStyles
</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">
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

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
        {{ __('Resource') }}
        </div>

        <!-- Nav Item - Soal Cerdas -->
        <li class="nav-item">
            <a class="nav-link py-2" href="{{route('member.soal.type' , 'cerdas')}}">
                <i class="fas fa-head-side-virus"></i>
                <span>{{ __('Soal Kecerdasan') }}</span>
            </a>
        </li>

        <li class="nav-item my-0">
            <a class="nav-link py-2" href="{{route('member.soal.type' , 'cermat')}}">
                <i class="fas fa-clipboard-list"></i>
                <span>{{ __('Soal Kecermatan') }}</span>
            </a>
        </li>

        <!-- Nav Item - Profile -->
        <li class="nav-item my-0">
            <a class="nav-link py-2" href="{{ route('member.history') }}">
                <i class="fas fa-history"></i>
                <span>{{ __('History') }}</span>
            </a>
        </li>

        @cannot('admin')
        <!-- Nav Item - Profile -->
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

        <!-- Nav Item - Profile -->
        <li class="nav-item {{ Nav::isRoute('admin.exams') }}">
            <a class="nav-link py-2" href="{{ route('admin.exams') }}">
                {{-- <i class="fas fa-fw fa-user"></i> --}}
                <i class="fas fa-list"></i>
                <span>{{ __('List Psikotes') }}</span>
            </a>
        </li>

        <!-- Nav Item - About -->
        <li class="nav-item d-none {{ Nav::isRoute('admin.questions') }}">
            <a class="nav-link py-2" href="{{ route('admin.questions') }}">
                {{-- <i class="fas fa-fw fa-hands-helping"></i> --}}
                <i class="fas fa-question"></i>
                <span>{{ __('Soal') }}</span>
            </a>
        </li>

        <!-- Nav Item - About -->
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

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
               
                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <li class="nav-item dropdown no-arrow mx-1 d-none">
                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-bell fa-fw"></i>
                            <!-- Counter - Alerts -->
                            <span class="badge badge-danger badge-counter">3+</span>
                        </a>
                        <!-- Dropdown - Alerts -->
                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                            <h6 class="dropdown-header">
                                Alerts Center
                            </h6>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-primary">
                                        <i class="fas fa-file-alt text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 12, 2019</div>
                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-success">
                                        <i class="fas fa-donate text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 7, 2019</div>
                                    $290.29 has been deposited into your account!
                                </div>
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <div class="mr-3">
                                    <div class="icon-circle bg-warning">
                                        <i class="fas fa-exclamation-triangle text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <div class="small text-gray-500">December 2, 2019</div>
                                    Spending Alert: We've noticed unusually high spending for your account.
                                </div>
                            </a>
                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                        </div>
                    </li>                    
                    

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <figure class="img-profile rounded-circle avatar font-weight-bold" data-initial="{{ Auth::user()->name[0] }}"></figure>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{ route('myprofile') }}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('My Profile') }}
                            </a>
                            @can('admin')
                            <a class="dropdown-item" href="javascript:void(0)">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Settings') }}
                            </a>
                            @endcan
                       
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                {{ __('Logout') }}
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                @yield('main-content')

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Psikotes {{ now()->year }}</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Anda Yakin ingin logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Klik Tombol Logout untuk Keluar dari halaman ini</div>
            <div class="modal-footer">
                <button class="btn btn-link" type="button" data-dismiss="modal">{{ __('Cancel') }}</button>
                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>



@livewireScripts

<!-- Scripts -->
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
   



<script type="text/javascript">
	window.livewire.on('closeModal', () => {
		$('#createDataModal').modal('hide');
        $('#importDataModal').modal('hide');
	});
    



</script>

</body>
</html>
