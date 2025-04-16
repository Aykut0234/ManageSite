@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Over ons</h1>
    
    <p>
        Welkom bij <strong>{{ config('app.name', 'Onze Organisatie') }}</strong>! Wij zijn een gepassioneerd team dat zich inzet voor innovatie, transparantie en samenwerking.
    </p>

    <h2>🌟 Onze Missie</h2>
    <p>
        Onze missie is om technologie toegankelijk te maken voor iedereen. Of je nu een particulier, ondernemer of organisatie bent – wij bieden de juiste tools, kennis en ondersteuning om jouw doelen te realiseren.
    </p>

    <h2>🤝 Wat wij doen</h2>
    <ul>
        <li>Webontwikkeling en beheer</li>
        <li>Integratie van moderne technologieën zoals Laravel, Vue.js en AI</li>
        <li>Advies en ondersteuning op maat</li>
        <li>Workshops, trainingen en kennisdeling</li>
    </ul>

    <h2>🧠 Ons Team</h2>
    <p>
        Ons team bestaat uit ervaren ontwikkelaars, ontwerpers en strategen. Wat ons uniek maakt, is onze focus op kwaliteit én gebruiksvriendelijkheid.
    </p>

    <h2>📍 Locatie</h2>
    <p>
        Wij zijn gevestigd in Nederland, maar werken samen met klanten uit heel Europa.
    </p>

    <p>
        Wil je samenwerken of meer weten? Neem gerust <a href="{{ route('dashboard.openbaar') }}">contact</a> met ons op!
    </p>
</div>
@endsection
