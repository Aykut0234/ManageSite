@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);">
        
        <h1 style="font-size: 32px; color: #1e293b; margin-bottom: 20px;">📰 Laatste Nieuws</h1>
        <p style="font-size: 18px; color: #475569; margin-bottom: 30px;">
            Blijf op de hoogte van onze nieuwste ontwikkelingen, evenementen en belangrijke aankondigingen.
        </p>

        <div style="display: flex; flex-direction: column; gap: 32px;">

            <div class="news-card">
                <h2 class="news-title">📢 Nieuwe samenwerking met BeveiligingsPartner NL</h2>
                <p class="news-date">16 april 2025</p>
                <p>
                    We zijn trots om aan te kondigen dat we gaan samenwerken met BeveiligingsPartner NL om onze slimme alarmsystemen nog efficiënter te maken. 
                    Deze samenwerking betekent kortingen voor klanten én snellere service.
                </p>
            </div>

            <div class="news-card">
                <h2 class="news-title">🚨 Nieuwe workshopreeks over slimme camera’s</h2>
                <p class="news-date">10 april 2025</p>
                <p>
                    Onze populaire workshop ‘Slimme camera’s installeren en beheren’ keert terug vanaf 1 mei! 
                    Schrijf je snel in via onze <a href="#" class="btn-link">programma-pagina</a>.
                </p>
            </div>

            <div class="news-card">
                <h2 class="news-title">💬 We zijn gestart met een chatsysteem!</h2>
                <p class="news-date">5 april 2025</p>
                <p>
                    Je kan nu direct via je dashboard met ons supportteam chatten. 
                    Heb je een vraag over installatie of je bestelling? Wij staan voor je klaar.
                </p>
            </div>

        </div>
    </div>
</div>
@endsection
