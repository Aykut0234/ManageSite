@extends('layouts.app')

@section('content')
<div class="container">
    <h1>📅 Agenda & Evenementen</h1>
    <p>Bekijk onze geplande workshops, lezingen en infosessies. Kom langs en leer alles over woningbeveiliging!</p>

    <div class="event">
        <h2>🔐 Workshop: Slimme deurbellen installeren</h2>
        <p class="text-muted">📍 Amsterdam – 25 april 2025, 13:00 - 16:00</p>
        <p>
            Leer in één middag hoe je een slimme deurbel installeert en configureert. Inclusief demonstraties en testmodellen.
        </p>
    </div>

    <div class="event">
        <h2>🎤 Infoavond: Hoe kies je het juiste alarmsysteem?</h2>
        <p class="text-muted">📍 Rotterdam – 3 mei 2025, 19:00 - 21:00</p>
        <p>
            Een gratis informatiesessie over de verschillende soorten alarmsystemen, geschikt voor zowel woningen als kleine bedrijven.
        </p>
    </div>

    <div class="event">
        <h2>🛠️ Live demo: Camerabewaking opzetten</h2>
        <p class="text-muted">📍 Utrecht – 12 mei 2025, 10:00 - 12:00</p>
        <p>
            Ontdek hoe je IP-camera’s opzet en beheert, inclusief uitleg over opslag, apps en live monitoring.
        </p>
    </div>
</div>
@endsection
