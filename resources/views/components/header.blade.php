<header class="navbar-full">
    <div class="nav-left">
        <a href="{{ route('dashboard.openbaar') }}" class="logo">🌐 MijnWebsite</a>
    </div>

    <ul class="nav-menu">
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
                    <li><a href="{{ route('admin.files.menu') }}">Menu</a></li>
                    <li><a href="{{ route('admin.files.css') }}">CSS</a></li>
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
</header>
