@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📝 Bewerken: {{ $name }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ $route }}">
        @csrf
        <div class="editor-container">
            <textarea id="code" name="content">{{ old('content', $content) }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">Opslaan</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary" style="margin-bottom: 20px; float: right;">
            ← Terug
        </a>
    </form>
</div>
@endsection

@section('scripts')
<!-- ✅ CodeMirror styles + scripts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/theme/material-darker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/php/php.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/javascript/javascript.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/css/css.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/htmlmixed/htmlmixed.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const filename = @json($name);
        let mode = "application/x-httpd-php";

        // Kies de juiste mode op basis van de bestandsnaam
        if (filename.includes('.css')) mode = "css";
        else if (filename.includes('.blade.php')) mode = "htmlmixed";
        else if (filename.includes('.js')) mode = "javascript";

        // Initialiseer de CodeMirror-editor
        const editor = CodeMirror.fromTextArea(document.getElementById("code"), {
            lineNumbers: true,
            mode: mode,
            theme: "material-darker",
            tabSize: 4,
            indentUnit: 4,
            indentWithTabs: true,
        });

        // Zorg ervoor dat de editor de container opvult
        editor.setSize("100%", "100%");  // Gebruik 100% breedte en hoogte van de container
    });
</script>
@endsection

<style>
    /* Zorg ervoor dat de editor-container de volledige ruimte gebruikt */
    .editor-container {
        position: relative;
        width: 100%;
        height: 80vh;  /* De container gebruikt 80% van de hoogte van de viewport */
        resize: both;
        overflow: hidden;
    }

    /* Zorg ervoor dat de CodeMirror editor zich aanpast aan de container */
    .CodeMirror {
        height: 100% !important;
        width: 100% !important;  /* Zorg ervoor dat de editor de volledige breedte en hoogte gebruikt */
    }

    /* Stijl voor de terugknop rechts */
    .btn-secondary {
        float: right;
    }
</style>
