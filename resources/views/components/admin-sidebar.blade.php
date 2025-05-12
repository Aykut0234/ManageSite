<aside style="width: 260px; background: linear-gradient(to bottom, #1e293b, #0f172a); color: white; padding: 24px; display: flex; flex-direction: column;">
    <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 16px;">🌐 MijnWebsite</h2>

    {{-- 🌍 Taalkeuze vlaggen direct onder MijnWebsite --}}


    <nav>
        <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
            <li><a href="{{ route('dashboard.openbaar') }}" class="sidebar-link" style="color: #fff;">🏠 Home</a></li>
            <li><a href="{{ route('overons') }}" class="sidebar-link" style="color: #fff;">ℹ️ Over ons</a></li>
            <li><a href="{{ route('standpunten') }}" class="sidebar-link" style="color: #fff;">📌 Standpunten</a></li>
            <li><a href="{{ route('nieuws') }}" class="sidebar-link" style="color: #fff;">📰 Nieuws</a></li>
            <li><a href="{{ route('contact') }}" class="sidebar-link" style="color: #fff;">📬 Contact</a></li>

            <hr style="border-color: #334155; margin: 16px 0;">

            <li><a href="{{ route('admin.users.list') }}" class="sidebar-link" style="color: #fff;">👥 Gebruikers</a></li>
            <li><a href="{{ route('admin.files.essentials') }}" class="sidebar-link" style="color: #fff;">📁 Frontend Bestanden</a></li>

            <li>
                <a href="{{ route('admin.settings.logo') }}" class="sidebar-link" style="color: #fff; font-weight: bold;">
                    📁 Bestanden Uploaden
                </a>
            </li>

            <li class="dropdown-group">
                <div class="dropdown-toggle" onclick="toggleSidebarDropdown()" style="cursor: pointer; font-weight: 600;">
                    ⚙️ Alle bestanden ▾
                </div>
                <ul id="sidebarDropdown" style="list-style: none; padding-left: 12px; margin-top: 10px; display: none; flex-direction: column; gap: 8px;">
                    <li><a href="{{ route('admin.files.blades') }}" class="sidebar-link" style="color: #fff;">📄 Blade-bestanden</a></li>
                    <li><a href="{{ route('admin.files.controllers') }}" class="sidebar-link" style="color: #fff;">📁 Controllers</a></li>
                    <li><a href="{{ route('admin.special.web') }}" class="sidebar-link" style="color: #fff;">🛠️ Routes (web.php)</a></li>
                    <li><a href="{{ route('admin.files.menu') }}" class="sidebar-link" style="color: #fff;">🧭 Menu (app.blade.php)</a></li>
                    <li><a href="{{ route('admin.files.css') }}" class="sidebar-link" style="color: #fff;">🎨 CSS (style.css)</a></li>
                </ul>
            </li>

            <li><a href="{{ route('chat.admin.list') }}" class="sidebar-link" style="color: #fff;">💬 Chats met gebruikers</a></li>

            <hr style="border-color: #334155; margin: 16px 0;">

            <li>
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="sidebar-link"
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

<script>
    function toggleSidebarDropdown() {
        const dropdown = document.getElementById('sidebarDropdown');
        const isOpen = dropdown.style.display === 'block';
        dropdown.style.display = isOpen ? 'none' : 'block';
        localStorage.setItem('sidebarDropdownOpen', !isOpen);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const currentRoute = window.location.href;

        // Highlight actieve link
        const links = document.querySelectorAll('.sidebar-link');
        links.forEach(link => {
            if (link.href === currentRoute) {
                link.style.backgroundColor = '#0b5ed7';
                link.style.color = '#ffffff';
                link.style.padding = '6px 10px';
                link.style.borderRadius = '6px';
            }
        });

        // Bestanden dropdown openen bij match
        const dropdownRoutes = [
            "{{ route('admin.files.blades') }}",
            "{{ route('admin.files.controllers') }}",
            "{{ route('admin.special.web') }}",
            "{{ route('admin.files.menu') }}",
            "{{ route('admin.files.css') }}"
        ];
        const dropdown = document.getElementById('sidebarDropdown');
        if (dropdownRoutes.includes(currentRoute) || localStorage.getItem('sidebarDropdownOpen') === 'true') {
            dropdown.style.display = 'block';
        }

        // Taal dropdown
        const langBtn = document.getElementById('langSidebarBtn');
        const langDropdown = document.getElementById('langSidebarDropdown');

        langBtn?.addEventListener('click', function (e) {
            e.stopPropagation();
            langDropdown.style.display = (langDropdown.style.display === 'block') ? 'none' : 'block';
        });

        document.addEventListener('click', function (e) {
            if (!langDropdown.contains(e.target) && e.target !== langBtn) {
                langDropdown.style.display = 'none';
            }
        });
    });
</script>

