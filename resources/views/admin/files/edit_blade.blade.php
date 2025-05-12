@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📝 Bewerken: {{ $name }}</h2>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.files.blade.update') }}" style="margin-top: 30px;">
        @csrf
    
        <!-- Verborgen veld voor de oorspronkelijke naam -->
        <input type="hidden" name="old_name" value="{{ $name }}">
    
        <div class="mb-4">
            <label for="new_name" style="font-weight: 600; color: #1e293b;">Bestandsnaam</label>
            <input type="text" name="new_name" id="new_name" class="form-control"
                value="{{ old('new_name', $name) }}"
                style="width: 100%; padding: 10px; border: 1px solid #e2e8f0; border-radius: 6px; background-color: #fff;">
            <small style="color: #64748b;">Bijvoorbeeld: <code>pages/about.blade.php</code></small>
        </div>
    
        <div class="editor-container" style="margin-bottom: 20px;">
            <label for="code" style="font-weight: 600; color: #1e293b;">Inhoud</label>
            <textarea id="code" name="content" required>{{ old('content', $content) }}</textarea>
        </div>
    
        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <button type="submit" class="btn btn-primary">💾 Opslaan</button>
            <a href="{{ url()->previous() }}" class="btn btn-secondary">← Terug</a>
        </div>
    </form>
    
</div>
@endsection

@section('scripts')
<!-- ✅ CodeMirror styles & JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/theme/material-darker.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.js"></script>

<!-- ✅ Belangrijke modes in juiste volgorde -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/xml/xml.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/css/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/htmlmixed/htmlmixed.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/php/php.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const textarea = document.getElementById("code");
        if (textarea) {
            const editor = CodeMirror.fromTextArea(textarea, {
                lineNumbers: true,
                mode: "application/x-httpd-php",
                matchBrackets: true,
                theme: "material-darker",
                tabSize: 4,
                indentUnit: 4,
                indentWithTabs: true,
            });
            editor.setSize("100%", "100vh"); // Maak de editor 100% van de breedte en hoogte van het scherm
        }
    });
</script>
@endsection

<style>
    /* Zorg ervoor dat de editor-container de volledige ruimte gebruikt */
    .editor-container {
        position: relative;
        width: 100%;
        height: 100vh; /* Maak de container de volledige hoogte van het scherm */
        resize: both;
        overflow: hidden;
    }

    /* Zorg ervoor dat de CodeMirror editor de volledige container vult */
    .CodeMirror {
        height: 100% !important;
        width: 100% !important;
    }

    /* Stijl voor de terugknop rechts */
    .btn-secondary {
        float: right;
    }
</style>
