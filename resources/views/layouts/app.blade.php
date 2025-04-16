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

    <div class="layout-wrapper">

<<<<<<< Updated upstream
        <ul style="display: flex; gap: 20px; align-items: center; margin: 0; padding: 0; list-style: none;">
            <li><a href="{{ route('dashboard.openbaar') }}">Home</a></li>
            <li><a href="{{ route('overons') }}">Over ons</a></li>
            <li><a href="{{ route('standpunten') }}">Standpunten</a></li>
            <li><a href="{{ route('nieuws') }}">Nieuws</a></li>
            <li><a href="{{ route('programma') }}">Programma</a></li>
            <li><a href="{{ route('agenda') }}">Agenda</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
=======
        <!-- ✅ HEADER -->
        <header class="navbar">
            <div class="container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
                <div style="display: flex; align-items: center; gap: 12px;">
                    <a href="{{ route('dashboard.openbaar') }}" style="font-weight: 700; font-size: 20px; color: #0d6efd;">🌐 MijnWebsite</a>
                </div>
>>>>>>> Stashed changes

                <ul style="display: flex; gap: 20px; align-items: center; margin: 0; padding: 0; list-style: none;">
                    <li><a href="{{ route('dashboard.openbaar') }}">Home</a></li>
                    <li><a href="{{ route('overons') }}">Over ons</a></li>
                    <li><a href="#">Programma</a></li>
                    <li><a href="#">Contact</a></li>

                    @auth
                    @role('admin')
                        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" id="dropdownTrigger">⚙️ Beheer ▾</a>
                            <ul class="dropdown-menu" id="dropdownMenu">
                                <li><a href="{{ route('admin.files.blades') }}">Blade-bestanden</a></li>
                                <li><a href="{{ route('admin.files.controllers') }}">Controllers</a></li>
                                <li><a href="{{ route('admin.special.web') }}">Routes (web.php)</a></li>
                                <li><a href="{{ route('admin.files.menu') }}">Menu (app.blade.php)</a></li>
                                <li><a href="{{ route('admin.files.css') }}">CSS (style.css)</a></li>
                            </ul>
                        </li>
                        <li><a href="{{ route('chat.admin.list') }}">💬 Chats</a></li>
                    @endrole

                    @role('gebruiker')
                        <li><a href="{{ route('user.dashboard') }}">Mijn Dashboard</a></li>
                        <li><a href="{{ route('chat.user') }}">💬 Chat</a></li>
                    @endrole

                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            🚪 Uitloggen
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                    @else
                        <li><a href="{{ route('login') }}">🔐 Inloggen</a></li>
                        <li><a href="{{ route('register') }}">📝 Registreren</a></li>
                    @endauth
                </ul>
            </div>
        </header>

        <!-- ✅ CONTENT -->
        <main class="content">
            @yield('content')
        </main>

        <!-- ✅ FOOTER -->
        <footer class="main-footer">
            <div class="container footer-content">
                <div>
                    <h3>🏢 Over Ons</h3>
                    <p>
                        Voorbeeldstraat 123<br>
                        1234 AB Stad<br>
                        KvK: 12345678<br>
                        <a href="mailto:info@bedrijf.nl">info@bedrijf.nl</a>
                    </p>
                </div>
                <div>
                    <h3>🔗 Navigatie</h3>
                    <ul>
                        <li><a href="{{ route('dashboard.openbaar') }}">Home</a></li>
                        <li><a href="#">Over ons</a></li>
                        <li><a href="#">Programma</a></li>
                        <li><a href="#">Nieuws</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h3>📱 Volg ons</h3>
                    <ul>
                        <li><a href="#">Facebook</a></li>
                        <li><a href="#">Instagram</a></li>
                        <li><a href="#">LinkedIn</a></li>
                    </ul>
                </div>
            </div>
        </footer>

    </div>

    <!-- ✅ CodeMirror CSS & JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/theme/material-darker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/php/php.min.js"></script>

    <!-- ✅ Dropdown script -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const trigger = document.getElementById('dropdownTrigger');
        const menu = document.getElementById('dropdownMenu');

        if (trigger && menu) {
            menu.style.display = 'none';

            trigger.addEventListener('click', function (e) {
                e.preventDefault();
                menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
            });

            document.addEventListener('click', function (e) {
                if (!trigger.contains(e.target) && !menu.contains(e.target)) {
                    menu.style.display = 'none';
                }
            });
        }
    });
    </script>

    @yield('scripts')
</body>
</html>
