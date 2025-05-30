@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📝 Bewerken: {{ $name }}</h2>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.files.blade.update', ['name' => $name]) }}">
        @csrf
        <div class="editor-container">
            <textarea id="code" name="content">{{ old('content', $content) }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary mt-3">Opslaan</button>
        <a href="{{ request()->headers->get('referer') }}" class="btn btn-secondary mt-3">
            ← Terug
        </a>
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
