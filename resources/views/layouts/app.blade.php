<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Vite standaard Breeze assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <!-- Navigatiebalk -->
    <nav style="background: #f8f9fa; padding: 10px; border-bottom: 1px solid #ccc;">
        <ul style="list-style: none; display: flex; gap: 20px; margin: 0;">
            <li><a href="/">Home</a></li>
            @auth
                @role('admin')
                    <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                @endrole
                @role('gebruiker')
                    <li><a href="{{ route('user.dashboard') }}">Mijn Dashboard</a></li>
                @endrole
                <li>
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Uitloggen
                    </a>
                </li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            @else
                <li><a href="{{ route('login') }}">Inloggen</a></li>
                <li><a href="{{ route('register') }}">Registreren</a></li>
            @endauth
        </ul>
    </nav>

    <!-- Pagina-inhoud -->
    <main class="py-4">
        @yield('content')
    </main>

</body>
</html>
