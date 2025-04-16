<aside style="width: 260px; background: linear-gradient(to bottom, #1e293b, #0f172a); color: white; padding: 24px; display: flex; flex-direction: column; min-height: 100vh;">
    <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 30px;">🌐 MijnWebsite</h2>

    <nav>
        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
            <li><a href="{{ route('dashboard.openbaar') }}" style="color: #fff;">🏠 Home</a></li>
            <li><a href="{{ route('overons') }}" style="color: #fff;">ℹ️ Over ons</a></li>
            <li><a href="{{ route('standpunten') }}" style="color: #fff;">📌 Standpunten</a></li>
            <li><a href="{{ route('nieuws') }}" style="color: #fff;">📰 Nieuws</a></li>
            <li><a href="{{ route('programma') }}" style="color: #fff;">📋 Programma</a></li>
            <li><a href="{{ route('agenda') }}" style="color: #fff;">📅 Agenda</a></li>
            <li><a href="{{ route('contact') }}" style="color: #fff;">📬 Contact</a></li>

            <hr style="border-color: #334155; margin: 16px 0;">

            <li><a href="{{ route('admin.dashboard') }}" style="color: #fff;">📊 Admin Dashboard</a></li>

            {{-- ✅ Dropdown --}}
            <li class="dropdown-group">
                <div class="dropdown-toggle" onclick="toggleSidebarDropdown()" style="cursor: pointer; font-weight: 600;">
                    ⚙️ Pagina’s bewerken ▾
                </div>
                <ul id="sidebarDropdown" style="list-style: none; padding-left: 12px; margin-top: 10px; display: none; flex-direction: column; gap: 8px;">
                    <li><a href="{{ route('admin.files.blades') }}" style="color: #fff;">📄 Blade-bestanden</a></li>
                    <li><a href="{{ route('admin.files.controllers') }}" style="color: #fff;">📁 Controllers</a></li>
                    <li><a href="{{ route('admin.special.web') }}" style="color: #fff;">🛠️ Routes (web.php)</a></li>
                    <li><a href="{{ route('admin.files.menu') }}" style="color: #fff;">🧭 Menu (app.blade.php)</a></li>
                    <li><a href="{{ route('admin.files.css') }}" style="color: #fff;">🎨 CSS (style.css)</a></li>
                </ul>
            </li>

            <li><a href="{{ route('chat.admin.list') }}" style="color: #fff;">💬 Chats met gebruikers</a></li>

            <hr style="border-color: #334155; margin: 16px 0;">

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   style="color: #f87171; font-weight: bold;">
                    🚪 Uitloggen
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</aside>
