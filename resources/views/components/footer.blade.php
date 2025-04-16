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
                <li><a href="{{ route('overons') }}">Over ons</a></li>
                <li><a href="{{ route('programma') }}">Programma</a></li>
                <li><a href="{{ route('nieuws') }}">Nieuws</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
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
