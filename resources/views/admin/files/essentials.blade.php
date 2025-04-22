@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-card">
        <div class="header">
            <h2>📂 Belangrijke Bestanden</h2>
        </div>

        {{-- Blade Bestanden --}}
        <div class="section">
            <h3 class="section-title">📄 Blade-bestanden</h3>
            @php $bladeSorted = $bladeFiles->where(fn($f) => str_ends_with($f['name'], '.blade.php'))->sortBy(fn($f) => $f['name'] === 'components/header.blade.php' ? '0' : ($f['name'] === 'components/footer.blade.php' ? '2' : '1')) @endphp
            @if ($bladeSorted->isNotEmpty())
                <ul class="file-list">
                    @foreach ($bladeSorted as $file)
                        <li class="file-item">
                            <a href="{{ $file['edit_route'] }}" class="btn-link">{{ basename($file['name']) }}</a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p class="no-files">Geen Blade-bestanden gevonden.</p>
            @endif
        </div>

        {{-- CSS Bestanden --}}
        <div class="section">
            <h3 class="section-title">📝 CSS Bestanden</h3>
            @if ($bladeFiles->where(fn($f) => str_ends_with($f['name'], '.css'))->isNotEmpty())
                <ul class="file-list">
                    @foreach ($bladeFiles as $file)
                        @if (str_ends_with($file['name'], '.css'))
                            <li class="file-item">
                                <a href="{{ $file['edit_route'] }}" class="btn-link">{{ basename($file['name']) }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p class="no-files">Geen CSS-bestanden gevonden.</p>
            @endif
        </div>

        {{-- Routes --}}
        <div class="section">
            <h3 class="section-title">🔗 Routes (web.php)</h3>
            @if ($bladeFiles->where(fn($f) => str_ends_with($f['name'], 'web.php'))->isNotEmpty())
                <ul class="file-list">
                    @foreach ($bladeFiles as $file)
                        @if (str_ends_with($file['name'], 'web.php'))
                            <li class="file-item">
                                <a href="{{ $file['edit_route'] }}" class="btn-link">{{ basename($file['name']) }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p class="no-files">Geen routebestand gevonden.</p>
            @endif
        </div>

        {{-- Controllers --}}
        <div class="section">
            <h3 class="section-title">🛠️ Controllers</h3>
            @if ($bladeFiles->where(fn($f) => str_ends_with($f['name'], '.php') && str_contains($f['name'], 'Controllers'))->isNotEmpty())
                <ul class="file-list">
                    @foreach ($bladeFiles as $file)
                        @if (str_ends_with($file['name'], '.php') && str_contains($file['name'], 'Controllers'))
                            <li class="file-item">
                                <a href="{{ $file['edit_route'] }}" class="btn-link">{{ basename($file['name']) }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p class="no-files">Geen controllers gevonden.</p>
            @endif
        </div>

        {{-- JSON Taalbestanden --}}
        <div class="section">
            <h3 class="section-title">🌐 Taalbestanden (JSON)</h3>
            @if ($bladeFiles->where(fn($f) => str_ends_with($f['name'], '.json'))->isNotEmpty())
                <ul class="file-list">
                    @foreach ($bladeFiles as $file)
                        @if (str_ends_with($file['name'], '.json'))
                            <li class="file-item">
                                <a href="{{ $file['edit_route'] }}" class="btn-link">{{ basename($file['name']) }}</a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            @else
                <p class="no-files">Geen taalbestanden gevonden.</p>
            @endif
        </div>

        <a href="{{ url()->previous() }}" class="btn btn-secondary" style="margin-top: 40px;">
            ← Terug
        </a>
    </div>
</div>
@endsection
