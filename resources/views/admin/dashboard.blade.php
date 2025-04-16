@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04); margin-top: 30px;">
        <h1 style="font-size: 32px; color: #1e293b; margin-bottom: 10px;">👨‍💼 Welkom, Admin!</h1>
        <p style="font-size: 18px; color: #475569;">
            Je bent ingelogd als <strong>beheerder</strong>. Gebruik het menu hierboven om je dashboard te beheren.
        </p>

        <div style="margin-top: 30px;">
            <h3 style="font-size: 22px; color: #1d4ed8; margin-bottom: 12px;">🔧 Snelle toegang</h3>
            <ul style="list-style: none; padding-left: 0; color: #334155;">
                <li style="margin-bottom: 10px;">📄 <a href="{{ route('admin.files.blades') }}" class="btn-link">Blade-bestanden beheren</a></li>
                <li style="margin-bottom: 10px;">🧩 <a href="{{ route('admin.files.controllers') }}" class="btn-link">Controllers beheren</a></li>
                <li style="margin-bottom: 10px;">📂 <a href="{{ route('admin.special.web') }}" class="btn-link">Routes (web.php) aanpassen</a></li>
                <li style="margin-bottom: 10px;">🎨 <a href="{{ route('admin.files.css') }}" class="btn-link">CSS-bestanden wijzigen</a></li>
                <li style="margin-bottom: 10px;">💬 <a href="{{ route('chat.admin.list') }}" class="btn-link">Gebruikersgesprekken bekijken</a></li>
            </ul>
        </div>
    </div>
</div>
@endsection
