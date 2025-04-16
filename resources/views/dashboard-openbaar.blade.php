@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);">
        <h1 style="font-size: 32px; margin-bottom: 10px; color: #1e293b;">👋 Welkom op onze website</h1>
        <p style="font-size: 18px; color: #475569; margin-bottom: 30px;">
            Dit is het openbare dashboard. Iedereen — of je nu ingelogd bent of niet — kan deze pagina bekijken.
        </p>

        <div>
            <h3 style="font-size: 22px; margin-bottom: 16px; color: #1d4ed8;">Wat kun je hier doen?</h3>
            <ul style="list-style: none; padding-left: 0; color: #334155;">
                <li style="margin-bottom: 10px;">
                    🔍 Bekijk ons <a href="#" class="btn-link">projectoverzicht</a>
                </li>
                <li style="margin-bottom: 10px;">
                    📖 Lees meer <a href="#" class="btn-link">over ons</a>
                </li>
                <li style="margin-bottom: 10px;">
                    🗓️ Bekijk de <a href="#" class="btn-link">nieuws & agenda</a>
                </li>
                <li style="margin-bottom: 10px;">
                    ✅ Wil je meedoen? 
                    <a href="{{ route('register') }}" class="btn-link">Registreer je</a> of 
                    <a href="{{ route('login') }}" class="btn-link">log in</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
