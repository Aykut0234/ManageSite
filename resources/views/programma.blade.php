@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">

        <h1 style="font-size: 32px; margin-bottom: 20px; color: #1e293b;">📋 Ons Programma</h1>
        <p style="font-size: 18px; color: #475569; margin-bottom: 30px;">
            Hier vind je een overzicht van ons actuele programma. Of je nu wilt deelnemen aan een training, een lezing wilt bijwonen of gewoon wilt kennismaken — er is voor ieder wat wils!
        </p>

        <div style="display: flex; flex-direction: column; gap: 32px;">

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">🔧 Workshops & Trainingen</h2>
                <ul style="list-style: disc; padding-left: 20px; color: #334155;">
                    <li style="margin-bottom: 10px;">
                        <strong>Smart Home Basics</strong> – Leer hoe je je woning slimmer maakt met camera's, slimme deurbellen en verlichting. <em>Elke woensdag om 19:00</em>
                    </li>
                    <li>
                        <strong>Veiligheid in en om het huis</strong> – Praktische sessies over het verhogen van je woonveiligheid. <em>Elke zaterdag om 14:00</em>
                    </li>
                </ul>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">🎤 Informatieve Sessies</h2>
                <ul style="list-style: disc; padding-left: 20px; color: #334155;">
                    <li style="margin-bottom: 10px;">
                        <strong>Digitale Veiligheid</strong> – Bescherm je gegevens en apparaten tegen online gevaren.
                    </li>
                    <li>
                        <strong>Beveiligingssystemen uitgelegd</strong> – Alles over alarmsystemen en camerabewaking, voor beginners en gevorderden.
                    </li>
                </ul>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">📍 Locaties</h2>
                <p style="color: #334155;">
                    De meeste activiteiten vinden plaats op onze hoofdlocatie in <strong>Rotterdam</strong>. In sommige gevallen organiseren we ook bijeenkomsten in omliggende steden of online via Zoom.
                </p>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">📅 Deelname & Inschrijven</h2>
                <p style="color: #334155;">
                    Alle activiteiten zijn gratis, maar registratie is verplicht. Ga naar onze
                    <a href="#" class="btn-link">inschrijfpagina</a> om je plek te reserveren.
                </p>
            </section>

        </div>
    </div>
</div>
@endsection
