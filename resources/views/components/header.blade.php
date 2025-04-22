<header class="navbar-full">
    <div class="nav-left">
        @php
            $setting = \App\Models\Setting::first();
        @endphp
        @if($setting && $setting->logo)
            <a href="{{ route('dashboard.openbaar') }}" class="logo">
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="Website Logo" style="max-height: 40px;">
            </a>
        @else
            <a href="{{ route('dashboard.openbaar') }}" class="logo">🌐 {{ __('home') }}</a>
        @endif
    </div>

    <ul class="nav-menu">
        <li><a href="{{ route('dashboard.openbaar') }}">{{ __('home') }}</a></li>
        <li><a href="{{ route('overons') }}">{{ __('about_us') }}</a></li>
        <li><a href="{{ route('standpunten') }}">{{ __('points') }}</a></li>
        <li><a href="{{ route('contact') }}">{{ __('contact') }}</a></li>
        <li><a href="{{ route('donatie.index') }}">{{ __('donate') }}</a></li>

        @auth
        @role('admin')
            <li><a href="{{ route('admin.dashboard') }}">{{ __('dashboard') }}</a></li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" id="dropdownTrigger">{{ __('manage') }}</a>
                <ul class="dropdown-menu" id="dropdownMenu">
                    <li><a href="{{ route('admin.files.blades') }}">Blade-bestanden</a></li>
                    <li><a href="{{ route('admin.files.controllers') }}">Controllers</a></li>
                    <li><a href="{{ route('admin.special.web') }}">Routes (web.php)</a></li>
                    <li><a href="{{ route('admin.files.menu') }}">Menu</a></li>
                    <li><a href="{{ route('admin.files.css') }}">CSS</a></li>
                </ul>
            </li>
            <li><a href="{{ route('chat.admin.list') }}">{{ __('chat') }}</a></li>
        @endrole

        @role('gebruiker')
            <li><a href="{{ route('user.dashboard') }}">{{ __('dashboard') }}</a></li>
            <li><a href="{{ route('chat.user') }}">{{ __('chat') }}</a></li>
        @endrole

        <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
               {{ __('logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>
        @else
            <li><a href="{{ route('login') }}">{{ __('login') }}</a></li>
            <li><a href="{{ route('register') }}">{{ __('register') }}</a></li>
        @endauth

        {{-- 🌍 Taalkeuze dropdown met vlaggetjes --}}
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" id="languageDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ __('language') }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="languageDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('locale.set', 'en') }}">
                        <img src="https://flagcdn.com/w20/gb.png" alt="EN" width="20" style="margin-right: 8px;"> English
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('locale.set', 'fr') }}">
                        <img src="https://flagcdn.com/w20/fr.png" alt="FR" width="20" style="margin-right: 8px;"> Français
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('locale.set', 'ru') }}">
                        <img src="https://flagcdn.com/w20/ru.png" alt="RU" width="20" style="margin-right: 8px;"> Русский
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('locale.set', 'am') }}">
                        <img src="https://flagcdn.com/w20/am.png" alt="AM" width="20" style="margin-right: 8px;"> Հայերեն
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</header>
