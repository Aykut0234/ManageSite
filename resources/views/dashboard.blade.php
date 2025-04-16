@extends('layouts.app')

@section('content')
<div class="container">
    <div class="dashboard-header" style="text-align: center; margin-bottom: 30px;">
        <h1 style="font-size: 32px; color: #1e293b; font-weight: 700;">Mijn Dashboard</h1>
        <p style="color: #64748b;">Welkom bij je persoonlijke omgeving. Hier kun je je berichten en gegevens beheren.</p>
    </div>

    <div class="dashboard-content" style="display: flex; flex-wrap: wrap; gap: 20px;">
        <!-- Berichtensectie -->
        <div class="dashboard-item" style="background-color: #ffffff; border-radius: 10px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); width: 100%; max-width: 300px;">
            <h3 style="font-size: 24px; color: #1e293b; margin-bottom: 12px;">📬 Berichten</h3>
            <ul style="list-style: none; padding: 0;">
                <li style="margin-bottom: 12px;"><a href="#" style="color: #0d6efd; text-decoration: none; font-weight: 500;">Bekijk al je berichten</a></li>
                <li><a href="#" style="color: #0d6efd; text-decoration: none; font-weight: 500;">Beheer je meldingen</a></li>
            </ul>
        </div>

        <!-- Gebruikersgegevens sectie -->
        <div class="dashboard-item" style="background-color: #ffffff; border-radius: 10px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); width: 100%; max-width: 300px;">
            <h3 style="font-size: 24px; color: #1e293b; margin-bottom: 12px;">👤 Mijn Gegevens</h3>
            <ul style="list-style: none; padding: 0;">
                <li style="margin-bottom: 12px;"><a href="#" style="color: #0d6efd; text-decoration: none; font-weight: 500;">Bekijk mijn profiel</a></li>
                <li><a href="#" style="color: #0d6efd; text-decoration: none; font-weight: 500;">Bewerk mijn gegevens</a></li>
            </ul>
        </div>

        <!-- Extra secties kunnen hier worden toegevoegd -->
        <div class="dashboard-item" style="background-color: #ffffff; border-radius: 10px; padding: 20px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); width: 100%; max-width: 300px;">
            <h3 style="font-size: 24px; color: #1e293b; margin-bottom: 12px;">⚙️ Instellingen</h3>
            <ul style="list-style: none; padding: 0;">
                <li style="margin-bottom: 12px;"><a href="#" style="color: #0d6efd; text-decoration: none; font-weight: 500;">Systeeminstellingen</a></li>
                <li><a href="#" style="color: #0d6efd; text-decoration: none; font-weight: 500;">Beveiligingsinstellingen</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
