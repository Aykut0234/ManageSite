@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">

        <h1 style="font-size: 32px; margin-bottom: 20px; color: #1e293b;">📅 Agenda & Evenementen</h1>
        <p style="font-size: 18px; color: #475569; margin-bottom: 30px;">
            Bekijk onze geplande workshops, lezingen en infosessies. Kom langs en leer alles over woningbeveiliging!
        </p>

        <div style="display: flex; flex-direction: column; gap: 32px;">

            <div class="event-card">
                <h2 class="event-title">🔐 Workshop: Slimme deurbellen installeren</h2>
                <p class="event-meta">📍 Amsterdam – 25 april 2025, 13:00 - 16:00</p>
                <p>
                    Leer in één middag hoe je een slimme deurbel installeert en configureert. Inclusief demonstraties en testmodellen.
                </p>
            </div>

            <div class="event-card">
                <h2 class="event-title">🎤 Infoavond: Hoe kies je het juiste alarmsysteem?</h2>
                <p class="event-meta">📍 Rotterdam – 3 mei 2025, 19:00 - 21:00</p>
                <p>
                    Een gratis informatiesessie over de verschillende soorten alarmsystemen, geschikt voor zowel woningen als kleine bedrijven.
                </p>
            </div>

            <div class="event-card">
                <h2 class="event-title">🛠️ Live demo: Camerabewaking opzetten</h2>
                <p class="event-meta">📍 Utrecht – 12 mei 2025, 10:00 - 12:00</p>
                <p>
                    Ontdek hoe je IP-camera’s opzet en beheert, inclusief uitleg over opslag, apps en live monitoring.
                </p>
            </div>

        </div>

    </div>
</div>
@endsection