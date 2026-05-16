<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>@yield('title', 'SIMKESMEN – Sistem Informasi Monitoring Kesehatan Mental')</title>

<script src="https://cdn.tailwindcss.com"></script>
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800;900&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

<script src="//unpkg.com/alpinejs" defer></script>
{{-- Global CSS --}}
<link rel="stylesheet" href="{{ asset('css/simkesmen.css') }}">

{{-- favicon --}}
<link rel="icon" type="image/x-icon" href="{{ asset('gambar/favicon.png') }}">


@stack('styles')
</head>
<body>

@yield('content')

{{-- Global JS --}}
<script src="{{ asset('js/simkesmen.js') }}"></script>

@stack('scripts')
</body>
</html>
