@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">
        
        <h1 style="font-size: 32px; margin-bottom: 20px; color: #1e293b;">ℹ️ Over ons</h1>
        
        <p style="font-size: 18px; color: #475569; margin-bottom: 30px;">
            Welkom bij <strong>{{ config('app.name', 'Onze Organisatie') }}</strong>! Wij zijn een gepassioneerd team dat zich inzet voor innovatie, transparantie en samenwerking.
        </p>

        <div style="display: flex; flex-direction: column; gap: 32px;">

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">🌟 Onze Missie</h2>
                <p style="color: #334155;">
                    Onze missie is om technologie toegankelijk te maken voor iedereen. Of je nu een particulier, ondernemer of organisatie bent – wij bieden de juiste tools, kennis en ondersteuning om jouw doelen te realiseren.
                </p>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">🤝 Wat wij doen</h2>
                <ul style="list-style: disc; padding-left: 20px; color: #334155;">
                    <li style="margin-bottom: 8px;">Webontwikkeling en beheer</li>
                    <li style="margin-bottom: 8px;">Integratie van moderne technologieën zoals Laravel, Vue.js en AI</li>
                    <li style="margin-bottom: 8px;">Advies en ondersteuning op maat</li>
                    <li>Workshops, trainingen en kennisdeling</li>
                </ul>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">🧠 Ons Team</h2>
                <p style="color: #334155;">
                    Ons team bestaat uit ervaren ontwikkelaars, ontwerpers en strategen. Wat ons uniek maakt, is onze focus op kwaliteit én gebruiksvriendelijkheid.
                </p>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">📍 Locatie</h2>
                <p style="color: #334155;">
                    Wij zijn gevestigd in Nederland, maar werken samen met klanten uit heel Europa.
                </p>
            </section>

            <section>
                <p style="color: #475569;">
                    Wil je samenwerken of meer weten? Neem gerust <a href="{{ route('dashboard.openbaar') }}" class="btn-link">contact</a> met ons op!
                </p>
            </section>

        </div>
    </div>
</div>
@endsection
