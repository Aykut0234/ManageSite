@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📚 Pagina’s bewerken</h2>
    <p>Kies wat je wilt bewerken:</p>

    <ul style="list-style: none; padding-left: 0;">
        <li><a href="{{ route('admin.files.blades') }}" class="btn btn-outline-primary mb-2">📝 Blade-bestanden</a></li>
        <li><a href="{{ route('admin.files.controllers') }}" class="btn btn-outline-primary mb-2">🧠 Controllers</a></li>
        <li><a href="{{ route('admin.special.web') }}" class="btn btn-outline-primary mb-2">🛣️ Routes (web.php)</a></li>
        <li><a href="{{ route('admin.files.menu') }}" class="btn btn-outline-primary mb-2">📋 Menu (app.blade.php)</a></li>
        <li><a href="{{ route('admin.files.css') }}" class="btn btn-outline-primary mb-2">🎨 CSS (style.css)</a></li>
    </ul>
</div>
@endsection
