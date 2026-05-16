<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Psikotes">
    <meta name="author" content="Priana S">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Psikotest') }}</title>

    <link href="/fontawesome5/css/fontawesome.css" rel="stylesheet">
    <link href="/fontawesome5/css/brands.css" rel="stylesheet">
    <link href="/fontawesome5/css/solid.css" rel="stylesheet">
    <link href="/fontawesome5/css/v5-font-face.css" rel="stylesheet">

    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />

    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

    @livewireStyles

    <style>
        :root {
            --brand-primary: #4F46E5;
            --brand-secondary: #6366F1;
            --brand-accent: #A5B4FC;
            --sidebar-width: 240px;
            --sidebar-bg: #0F0F1A;
            --sidebar-text: #A0A0B8;
            --sidebar-active-bg: rgba(99, 102, 241, 0.15);
            --sidebar-active-text: #A5B4FC;
            --sidebar-hover-bg: rgba(255,255,255,0.04);
            --topbar-height: 64px;
            --topbar-bg: #ffffff;
            --page-bg: #F3F4F8;
            --card-bg: #ffffff;
            --card-border: #E8E9F0;
            --text-primary: #1A1A2E;
            --text-secondary: #6B6B80;
            --radius: 12px;
            --radius-sm: 8px;
        }

        * { box-sizing: border-box; }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background: var(--page-bg);
            color: var(--text-primary);
            margin: 0;
            padding: 0;
        }

        /* ── Sidebar ── */
        #sidebar {
            position: fixed;
            top: 0; left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            z-index: 100;
            transition: transform 0.25s ease;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 20px 20px 16px;
            border-bottom: 1px solid rgba(255,255,255,0.06);
        }

        .sidebar-brand-icon {
            width: 34px;
            height: 34px;
            background: var(--brand-primary);
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-brand-icon i { color: #fff; font-size: 16px; }

        .sidebar-brand-text {
            font-size: 15px;
            font-weight: 700;
            color: #fff;
            letter-spacing: -0.3px;
        }

        .sidebar-brand-text span {
            display: block;
            font-size: 10px;
            font-weight: 400;
            color: var(--sidebar-text);
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .sidebar-nav {
            flex: 1;
            overflow-y: auto;
            padding: 12px 12px;
            scrollbar-width: none;
        }
        .sidebar-nav::-webkit-scrollbar { display: none; }

        .sidebar-label {
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: rgba(160,160,184,0.45);
            padding: 12px 8px 6px;
        }

        .sidebar-footer {
            padding: 12px;
            border-top: 1px solid rgba(255,255,255,0.06);
        }

        /* ── Topbar ── */
        #topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--topbar-height);
            background: var(--topbar-bg);
            border-bottom: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            padding: 0 24px;
            gap: 16px;
            z-index: 90;
        }

        .topbar-title {
            font-size: 15px;
            font-weight: 600;
            color: var(--text-primary);
            flex: 1;
        }

        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .topbar-btn {
            width: 36px;
            height: 36px;
            border-radius: var(--radius-sm);
            background: transparent;
            border: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--text-secondary);
            cursor: pointer;
            transition: all 0.15s;
            text-decoration: none;
        }
        .topbar-btn:hover { background: var(--page-bg); color: var(--brand-primary); }

        .user-pill {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 4px 10px 4px 4px;
            border-radius: 100px;
            border: 1px solid var(--card-border);
            cursor: pointer;
            position: relative;
            transition: background 0.15s;
            text-decoration: none;
        }
        .user-pill:hover { background: var(--page-bg); }

        .user-avatar {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-name {
            font-size: 13px;
            font-weight: 500;
            color: var(--text-primary);
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        /* ── Dropdown ── */
        .dropdown-modern {
            position: absolute;
            top: calc(100% + 8px);
            right: 0;
            background: #fff;
            border: 1px solid var(--card-border);
            border-radius: var(--radius);
            box-shadow: 0 8px 32px rgba(0,0,0,0.10);
            min-width: 180px;
            padding: 6px;
            z-index: 200;
            display: none;
        }
        .dropdown-modern.open { display: block; }

        .dropdown-modern a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 12px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            color: var(--text-primary);
            text-decoration: none;
            transition: background 0.12s;
        }
        .dropdown-modern a:hover { background: var(--page-bg); }
        .dropdown-modern a i { color: var(--text-secondary); font-size: 14px; }

        .dropdown-divider {
            height: 1px;
            background: var(--card-border);
            margin: 4px 0;
        }

        .dropdown-danger a { color: #DC2626; }
        .dropdown-danger a i { color: #DC2626; }

        /* ── Main content ── */
        #main-content {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            min-height: calc(100vh - var(--topbar-height));
            padding: 28px 28px;
        }

        /* ── Footer ── */
        #site-footer {
            margin-left: var(--sidebar-width);
            background: var(--card-bg);
            border-top: 1px solid var(--card-border);
            padding: 14px 28px;
            font-size: 12px;
            color: var(--text-secondary);
            text-align: center;
        }

        /* ── Timer styles ── */
        .jst-hours, .jst-minutes, .jst-seconds { float: left; }
        .jst-clearDiv { clear: both; }
        .jst-timeout { color: #DC2626; }

        /* ── Toastr custom ── */
        .custom-toastr {
            position: fixed;
            top: 80px;
            right: 24px;
            background: var(--brand-primary);
            color: #fff;
            padding: 14px 18px;
            border-radius: var(--radius);
            display: none;
            z-index: 9999;
            font-size: 14px;
            box-shadow: 0 4px 20px rgba(79,70,229,0.3);
        }

        /* ── Sidebar toggle mobile ── */
        #sidebarToggleMobile {
            display: none;
            background: none;
            border: none;
            color: var(--text-secondary);
            font-size: 20px;
            cursor: pointer;
            padding: 0;
            margin-right: 8px;
        }

        @media (max-width: 768px) {
            #sidebar { transform: translateX(-100%); }
            #sidebar.open { transform: translateX(0); }
            #topbar { left: 0; }
            #main-content { margin-left: 0; }
            #site-footer { margin-left: 0; }
            #sidebarToggleMobile { display: block; }
        }

        /* Logout modal modern */
        .modal-modern .modal-content {
            border-radius: var(--radius);
            border: 1px solid var(--card-border);
            box-shadow: 0 20px 60px rgba(0,0,0,0.12);
        }
        .modal-modern .modal-header {
            border-bottom: 1px solid var(--card-border);
            padding: 20px 24px 16px;
        }
        .modal-modern .modal-body { padding: 16px 24px; color: var(--text-secondary); font-size: 14px; }
        .modal-modern .modal-footer {
            border-top: 1px solid var(--card-border);
            padding: 16px 24px;
        }

        .btn-modern-primary {
            background: var(--brand-primary);
            color: #fff;
            border: none;
            border-radius: var(--radius-sm);
            padding: 8px 18px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.15s;
        }
        .btn-modern-primary:hover { opacity: 0.88; }

        .btn-modern-ghost {
            background: transparent;
            color: var(--text-secondary);
            border: 1px solid var(--card-border);
            border-radius: var(--radius-sm);
            padding: 8px 18px;
            font-size: 13px;
            font-weight: 500;
            cursor: pointer;
            transition: background 0.15s;
        }
        .btn-modern-ghost:hover { background: var(--page-bg); }

        .btn-modern-danger {
            background: #DC2626;
            color: #fff;
            border: none;
            border-radius: var(--radius-sm);
            padding: 8px 18px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.15s;
        }
        .btn-modern-danger:hover { opacity: 0.88; }
    </style>
</head>
<body id="page-top">

<!-- ── Sidebar ── -->
<aside id="sidebar">
    <div class="sidebar-brand">
        <div class="sidebar-brand-icon">
            <i class="fas fa-brain"></i>
        </div>
        <div class="sidebar-brand-text">
            Psikotest
            <span>Terpadu</span>
        </div>
    </div>

    <nav class="sidebar-nav">
        @can('admin')
            <x-side-bar-admin />
        @endcan
    </nav>

    <div class="sidebar-footer">
        <a href="#" data-toggle="modal" data-target="#logoutModal"
           style="display:flex;align-items:center;gap:10px;padding:9px 12px;border-radius:var(--radius-sm);color:var(--sidebar-text);font-size:13px;text-decoration:none;transition:background 0.12s;">
            <i class="fas fa-sign-out-alt" style="font-size:14px;"></i>
            Logout
        </a>
    </div>
</aside>

<!-- ── Topbar ── -->
<header id="topbar">
    <button id="sidebarToggleMobile" onclick="document.getElementById('sidebar').classList.toggle('open')">
        <i class="fas fa-bars"></i>
    </button>

    <span class="topbar-title">System Psikotest Terpadu</span>

    <div class="topbar-actions">
        <x-link-to-test />

        <!-- User dropdown -->
        <div style="position:relative;">
            <a class="user-pill" href="#" onclick="event.preventDefault(); toggleDropdown()">
                <img class="user-avatar"
                     src="{{ '/storage/' . auth()->user()->avatar }}"
                     alt="{{ Auth::user()->name }}"
                     onerror="this.onerror=null;this.src='{{ asset('img/user.png') }}';">
                <span class="user-name">{{ Auth::user()->name }}</span>
                <i class="fas fa-chevron-down" style="font-size:10px;color:var(--text-secondary);margin-left:2px;"></i>
            </a>

            <div class="dropdown-modern" id="userDropdown">
                <a href="{{ route('myprofile') }}">
                    <i class="fas fa-user-circle"></i> My Profile
                </a>
                @can('admin')
                <a href="javascript:void(0)">
                    <i class="fas fa-cogs"></i> Settings
                </a>
                @endcan
                <div class="dropdown-divider"></div>
                <div class="dropdown-danger">
                    <a href="#" data-toggle="modal" data-target="#logoutModal" onclick="closeDropdown()">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- ── Main Content ── -->
<main id="main-content">
    @yield('main-content')
</main>

<!-- ── Footer ── -->
<footer id="site-footer">
    Copyright &copy; {{ config('app.name') }} {{ now()->year }}
</footer>

<!-- ── Logout Modal ── -->
<div class="modal fade modal-modern" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-size:15px;font-weight:600;">Anda Yakin ingin logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                Klik Tombol Logout untuk Keluar dari halaman ini.
            </div>
            <div class="modal-footer" style="gap:8px;">
                <button class="btn-modern-ghost" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn-modern-danger" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>

@livewireScripts

<script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
<x-livewire-alert::scripts />

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/jquery.simple.timer.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap-toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script src="https://cdn.ckeditor.com/4.22.1/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

<script>
    function toggleDropdown() {
        document.getElementById('userDropdown').classList.toggle('open');
    }
    function closeDropdown() {
        document.getElementById('userDropdown').classList.remove('open');
    }
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.user-pill') && !e.target.closest('#userDropdown')) {
            closeDropdown();
        }
    });

    window.livewire.on('closeModal', () => {
        $('#createDataModal').modal('hide');
        $('#importDataModal').modal('hide');
        $('#hapusModal').modal('hide');
    });

    @if(in_array(\Request::route()->getName(), [
        "admin.questions.edit",
        "posts.create",
        "posts.edit",
        "admin.packages.create"
    ]))
    $(document).ready(function () {
        var ckConfig = {
            filebrowserUploadUrl: "{{ route('ckeditor.image-upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        };
        CKEDITOR.replace('ckeditor', ckConfig);
        CKEDITOR.inline('ckeditor-a', ckConfig);
        CKEDITOR.inline('ckeditor-b', ckConfig);
        CKEDITOR.inline('ckeditor-c', ckConfig);
        CKEDITOR.inline('ckeditor-d', ckConfig);
        CKEDITOR.inline('ckeditor-e', ckConfig);
    });
    @endif
</script>

@stack('scripts')
</body>
</html>