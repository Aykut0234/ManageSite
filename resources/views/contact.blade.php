@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">

        <h1 style="font-size: 32px; color: #1e293b; margin-bottom: 20px;">📬 Neem contact met ons op</h1>
        <p style="font-size: 18px; color: #475569; margin-bottom: 30px;">
            Heb je vragen over onze beveiligingsoplossingen of wil je een offerte aanvragen? Neem gerust contact met ons op.
        </p>

        <div style="display: flex; flex-direction: column; gap: 32px;">

            <!-- Contactgegevens -->
            <section class="contact-card">
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">📞 Contactgegevens</h2>
                <ul style="list-style: none; padding: 0; color: #334155; font-size: 16px;">
                    <li style="margin-bottom: 8px;"><strong>📧 E-mail:</strong> info@beveiligingsexpert.nl</li>
                    <li style="margin-bottom: 8px;"><strong>📱 Telefoon:</strong> 085 - 123 45 67</li>
                    <li style="margin-bottom: 8px;"><strong>🏢 Adres:</strong> Voorbeeldstraat 123, 1234 AB Amsterdam</li>
                    <li><strong>📮 Postadres:</strong> Postbus 456, 1000 AB Amsterdam</li>
                </ul>
            </section>

            <!-- Openingstijden -->
            <section class="contact-card">
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">🕒 Openingstijden</h2>
                <ul style="list-style: none; padding: 0; color: #334155; font-size: 16px;">
                    <li style="margin-bottom: 8px;">Maandag t/m vrijdag: 09:00 - 17:00</li>
                    <li>Zaterdag & zondag: Gesloten</li>
                </ul>
            </section>

            <!-- Reactietijd -->
            <section class="contact-card">
                <p style="color: #475569; font-size: 16px;">
                    We streven ernaar om binnen 24 uur te reageren op e-mailvragen.
                </p>
            </section>

        </div>

    </div>
</div>
@endsection
