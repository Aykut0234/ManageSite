@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-card">

        <div class="header">
            <h2>📂 Belangrijke Bestanden</h2>
        </div>

        <!-- Blade Bestanden Sectie -->
        <div class="section">
            <h3 class="section-title">📄 Blade-bestanden</h3>
            @if (count($bladeFiles) > 0)
                <ul class="file-list">
                    @foreach ($bladeFiles as $file)
                        @if (str_ends_with($file['name'], '.blade.php'))
                            <li class="file-item">
                                <a href="{{ $file['edit_route'] }}" class="btn-link">{{ $file['name'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p class="no-files">Geen Blade-bestanden gevonden.</p>
            @endif
        </div>

        <!-- CSS Bestanden Sectie -->
        <div class="section">
            <h3 class="section-title">📝 CSS Bestanden</h3>
            @if (count($bladeFiles) > 0)
                <ul class="file-list">
                    @foreach ($bladeFiles as $file)
                        @if (str_ends_with($file['name'], '.css'))
                            <li class="file-item">
                                <a href="{{ $file['edit_route'] }}" class="btn-link">{{ $file['name'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p class="no-files">Geen CSS-bestanden gevonden.</p>
            @endif
        </div>

        <!-- Routes Bestanden Sectie -->
        <div class="section">
            <h3 class="section-title">🔗 Routes (web.php)</h3>
            @if (count($bladeFiles) > 0)
                <ul class="file-list">
                    @foreach ($bladeFiles as $file)
                        @if (str_ends_with($file['name'], 'web.php'))
                            <li class="file-item">
                                <a href="{{ $file['edit_route'] }}" class="btn-link">{{ $file['name'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p class="no-files">Geen Routes-bestanden gevonden.</p>
            @endif
        </div>

        <!-- Controllers Sectie -->
        <div class="section">
            <h3 class="section-title">🛠️ Controllers</h3>
            @if (count($bladeFiles) > 0)
                <ul class="file-list">
                    @foreach ($bladeFiles as $file)
                        @if (str_ends_with($file['name'], '.php') && str_contains($file['name'], 'Controllers'))
                            <li class="file-item">
                                <a href="{{ $file['edit_route'] }}" class="btn-link">{{ $file['name'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p class="no-files">Geen Controllers gevonden.</p>
            @endif
        </div>

    </div>
</div>
@endsection
