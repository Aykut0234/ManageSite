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
    <nav style="background: #f8f9fa; padding: 10px; border-bottom: 1px solid #ccc;">
        <ul style="list-style: none; display: flex; gap: 20px; margin: 0;">
            <li><a href="{{ route('dashboard.openbaar') }}">Home</a></li>
            <li><a href="#">Over ons</a></li>
            <li><a href="#">Programma</a></li>
            <li><a href="#">Contact</a></li>

            @auth
                @role('admin')
                    <li><a href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                @endrole
                @role('admin')
                    <li><a href="{{ route('chat.admin.list') }}">💬 Chats met gebruikers</a></li>
                @endrole

                @role('gebruiker')
                    <li><a href="{{ route('user.dashboard') }}">Mijn Dashboard</a></li>
                    
                @endrole
                @role('gebruiker')
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
    <main class="py-4">
        @yield('content')
    </main>

    <!-- ✅ Footer -->
    <footer style="background: #f0f0f0; padding: 30px 0; margin-top: 50px; border-top: 1px solid #ccc;">
        <div style="max-width: 1200px; margin: auto; display: flex; justify-content: space-between; flex-wrap: wrap; gap: 30px; padding: 0 20px;">
            
            <!-- Logo & adres -->
            <div style="flex: 1;">
                <h3>🏠 Ons Bedrijf</h3>
                <p>Voorbeeldstraat 123<br>1234 AB Stad</p>
            </div>

            <!-- Links -->
            <div style="flex: 1;">
                <h3>Navigatie</h3>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="{{ route('dashboard.openbaar') }}">Home</a></li>
                    <li><a href="#">Over ons</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Nieuws</a></li>
                </ul>
            </div>

            
        </div>
    </footer>

</body>
</html>
