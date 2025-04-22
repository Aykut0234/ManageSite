<footer class="main-footer">
    <div class="container footer-content">
        <div>
            <h3>🏢 {{ __('about_us') }}</h3>
            <p>
                Voorbeeldstraat 123<br>
                1234 AB Stad<br>
                KvK: 12345678<br>
                <a href="mailto:info@bedrijf.nl">info@bedrijf.nl</a>
            </p>
        </div>
        <div>
            <h3>🔗 {{ __('navigation') }}</h3>
            <ul>
                <li><a href="{{ route('dashboard.openbaar') }}">{{ __('home') }}</a></li>
                <li><a href="{{ route('overons') }}">{{ __('about_us') }}</a></li>
                <li><a href="{{ route('programma') }}">{{ __('program') }}</a></li>
                <li><a href="{{ route('nieuws') }}">{{ __('news') }}</a></li>
                <li><a href="{{ route('contact') }}">{{ __('contact') }}</a></li>
            </ul>
        </div>
        <div>
            <h3>📱 {{ __('follow_us') }}</h3>
            <ul>
                <li><a href="#">Facebook</a></li>
                <li><a href="#">Instagram</a></li>
                <li><a href="#">LinkedIn</a></li>
            </ul>
        </div>
    </div>
</footer>
