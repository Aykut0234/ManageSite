<header class="navbar">
    <div class="container" style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap;">
        <div style="display: flex; align-items: center; gap: 12px;">
            <a href="{{ route('dashboard.openbaar') }}" style="font-weight: 700; font-size: 20px; color: #0d6efd;">
                🌐 MijnWebsite
            </a>
        </div>

        <ul style="display: flex; gap: 20px; align-items: center; margin: 0; padding: 0; list-style: none;">
            <li><a href="{{ route('dashboard.openbaar') }}">Home</a></li>
            <li><a href="{{ route('overons') }}">Over ons</a></li>
            <li><a href="{{ route('standpunten') }}">Standpunten</a></li>
            <li><a href="{{ route('nieuws') }}">Nieuws</a></li>
            <li><a href="{{ route('programma') }}">Programma</a></li>
            <li><a href="{{ route('agenda') }}">Agenda</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>

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
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
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
