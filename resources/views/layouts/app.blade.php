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

    <!-- Breeze/Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">

    <!-- ✅ Navigatiebalk -->
    <nav class="navbar">
        <ul>
            <li><a href="{{ route('dashboard.openbaar') }}">Home</a></li>
            <li><a href="#">Over ons</a></li>
            <li><a href="#">Programma</a></li>
            <li><a href="#">Contact</a></li>

            @auth
            @role('admin')
                <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle">📄 Pagina’s bewerken ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('admin.files.blades') }}">Blade-bestanden</a></li>
                        <li><a href="{{ route('admin.files.controllers') }}">Controllers</a></li>
                        <li><a href="{{ route('admin.special.web') }}">Routes (web.php)</a></li>
                        <li><a href="{{ route('admin.files.menu') }}">Menu (app.blade.php)</a></li>
                        <li><a href="{{ route('admin.files.css') }}">CSS (style.css)</a></li>
                    </ul>
                </li>
                <li><a href="{{ route('chat.admin.list') }}">💬 Chats met gebruikers</a></li>
            @endrole

            @role('gebruiker')
                <li><a href="{{ route('user.dashboard') }}">Mijn Dashboard</a></li>
                <li><a href="{{ route('chat.user') }}">💬 Chat met admin</a></li>
            @endrole

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    Uitloggen
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
            @else
                <li><a href="{{ route('login') }}">Inloggen</a></li>
                <li><a href="{{ route('register') }}">Registreren</a></li>
            @endauth
        </ul>
    </nav>

    <!-- ✅ Pagina-inhoud -->
    <main class="content">
        @yield('content')
    </main>

    <!-- ✅ Footer -->
    <footer class="main-footer">
        <div class="footer-content">
            <div>
                <h3>🏠 Ons Bedrijf</h3>
                <p>Voorbeeldstraat 123<br>1234 AB Stad</p>
            </div>
            <div>
                <h3>Navigatie</h3>
                <ul>
                    <li><a href="{{ route('dashboard.openbaar') }}">Home</a></li>
                    <li><a href="#">Over ons</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Nieuws</a></li>
                </ul>
            </div>
        </div>
    </footer>
    

</body>

<!-- ✅ CodeMirror CSS & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/theme/material-darker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/php/php.min.js"></script>

@yield('scripts')
</html>
