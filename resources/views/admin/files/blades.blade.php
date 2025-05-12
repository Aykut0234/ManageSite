@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-card">

        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 30px;">
            <h2 style="font-size: 28px; color: #1e293b; word-wrap: break-word;">📂 Blade-bestanden</h2>
            <a href="{{ route('admin.files.blade.create') }}" class="btn">
                + Nieuw bestand
            </a>
        </div>

        @if (count($bladeFiles) > 0)
            <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 16px;">
                @foreach ($bladeFiles as $file)
                #vorigepagina = "blades"
                    <li style="background-color: #f9fafb; padding: 16px 20px; border: 1px solid #e2e8f0; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.02); transition: box-shadow 0.2s; word-wrap: break-word;">
                        <a href="{{ route('admin.files.blade.edit', ['name' => $file['name']]) }}" style="word-wrap: break-word;">
                            {{ $file['name'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p style="color: #64748b; word-wrap: break-word;">Er zijn nog geen Blade-bestanden beschikbaar.</p>
        @endif

        <!-- CodeMirror editor -->
        <div class="editor-container" style="position: relative;">
            <label for="editor" style="font-weight: 600; color: #1e293b;">CodeMirror Editor</label>
            <textarea id="editor" name="editor" style="width: 100%; height: 400px; resize: both; overflow: auto; white-space: pre-wrap;"></textarea>
        </div>

    </div>

    <!-- Terugknop rechts uitlijnen -->
    <a href="{{ request()->headers->get('referer') }}" class="btn btn-secondary mt-3">
        ← Terug
    </a>
</div>

@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.5/mode/javascript/javascript.min.js"></script>

<script>
    // Initialiseren van de CodeMirror-editor
    var editor = CodeMirror.fromTextArea(document.getElementById("editor"), {
        lineNumbers: true,
        mode: "javascript", // Pas aan afhankelijk van het soort bestand dat je bewerkt (bijv. 'html', 'php', 'css')
        theme: "default", // Pas de thema aan zoals gewenst
    });
</script>
@endpush
