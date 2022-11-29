<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

	<title>@hasSection('title') @yield('title') | @endif {{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
	 @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
					@auth()
                    <ul class="navbar-nav mr-auto">
						<!--Nav Bar Hooks - Do not delete!!-->
						<li class="nav-item">
                            <a href="{{ url('/posts') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Posts</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/categories') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Categories</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/examevents') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Examevents</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/exam_events') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Exam_events</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/transactions') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Transactions</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/payment_methods') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Payment_methods</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/users') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Users</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/settings') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Settings</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/scores') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Scores</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/questions') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Questions</a> 
                        </li>
						<li class="nav-item">
                            <a href="{{ url('/exams') }}" class="nav-link"><i class="fab fa-laravel text-info"></i> Exams</a> 
                        </li>
                    </ul>
					@endauth()
					
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-2">
            @yield('content')
        </main>
    </div>
    @livewireScripts
<script type="text/javascript">
	window.livewire.on('closeModal', () => {
		$('#createDataModal').modal('hide');
	});
</script>
</body>
</html>
