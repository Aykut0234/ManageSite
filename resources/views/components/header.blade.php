<header class="navbar-full" style="display: flex; justify-content: space-between; align-items: center; padding: 10px 20px;">
    <div class="nav-left">
        @php $setting = \App\Models\Setting::first(); @endphp
        <a href="{{ route('dashboard.openbaar') }}" class="logo">
            @if($setting && $setting->logo)
                <img src="{{ asset('storage/' . $setting->logo) }}" alt="Logo" style="max-height: 40px;">
            @else
                🌐 {{ __('home') }}
            @endif
        </a>
    </div>

    <ul class="nav-menu" style="display: flex; gap: 15px; align-items: center; list-style: none; margin: 0;">
        <li><a href="{{ route('dashboard.openbaar') }}">{{ __('home') }}</a></li>
        <li><a href="{{ route('overons') }}">{{ __('about_us') }}</a></li>
        <li><a href="{{ route('standpunten') }}">{{ __('points') }}</a></li>
        <li><a href="{{ route('contact') }}">{{ __('contact') }}</a></li>
        <li><a href="{{ route('donatie.index') }}">{{ __('donate') }}</a></li>

        @auth
            @role('admin')
                <li><a href="{{ route('admin.dashboard') }}">{{ __('dashboard') }}</a></li>
                <li class="dropdown" style="position: relative;">
                    <a href="#" id="adminDropdownToggle">{{ __('manage') }}</a>
                    <ul id="adminDropdownMenu" style="display: none; position: absolute; top: 100%; left: 0; background: white; padding: 10px; border: 1px solid #ccc; list-style: none;">
                        <li><a href="{{ route('admin.files.blades') }}">Blade-bestanden</a></li>
                        <li><a href="{{ route('admin.files.controllers') }}">Controllers</a></li>
                        <li><a href="{{ route('admin.special.web') }}">Routes</a></li>
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
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </li>
        @else
            <li><a href="{{ route('login') }}">{{ __('login') }}</a></li>
            <li><a href="{{ route('register') }}">{{ __('register') }}</a></li>
        @endauth

        {{-- 🌍 Taalkeuze vlaggen --}}
        @php
    $locale = session('locale', app()->getLocale());
    $flags = ['en' => 'gb', 'fr' => 'fr', 'ru' => 'ru', 'am' => 'am'];
@endphp

<li style="position: relative;">
    <button id="langBtn" style="background: none; border: none; padding: 5px;">
        <img src="https://flagcdn.com/w40/{{ $flags[$locale] ?? 'gb' }}.png" alt="{{ strtoupper($locale) }}" width="30">
    </button>
    <ul id="langDropdown" style="display: none; position: absolute; top: 100%; right: 0; background: white; border: 1px solid #ccc; list-style: none; padding: 5px; margin: 0; z-index: 999;">
        @foreach ($flags as $lang => $flag)
            <li style="margin: 5px;">
                <a href="{{ route('locale.set', $lang) }}">
                    <img src="https://flagcdn.com/w40/{{ $flag }}.png" alt="{{ strtoupper($lang) }}" width="30">
                </a>
            </li>
        @endforeach
    </ul>
</li>

    </ul>
</header>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const langBtn = document.getElementById('langBtn');
        const langDropdown = document.getElementById('langDropdown');

        langBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            langDropdown.style.display = (langDropdown.style.display === 'block') ? 'none' : 'block';
        });

        document.addEventListener('click', function (e) {
            if (!langDropdown.contains(e.target)) {
                langDropdown.style.display = 'none';
            }
        });
    });
</script>
<style>
    #langDropdown img {
        transition: none !important;
        filter: none !important;
    }

    #langDropdown a:hover img {
        filter: none !important;
        transform: none !important;
    }

    #langDropdown a:hover {
        background: none !important;
    }
</style>