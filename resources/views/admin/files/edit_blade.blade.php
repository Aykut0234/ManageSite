@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📝 Bewerken: {{ $name }}</h2>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.files.blade.update', ['name' => $name]) }}">
        @csrf
        <textarea id="code" name="content">{{ old('content', $content) }}</textarea>
        <br>
        <button type="submit" class="btn btn-primary mt-3">Opslaan</button>
    </form>
    <a href="{{ url()->previous() }}" class="btn btn-secondary" style="margin-bottom: 20px;">
        ← Terug
    </a>
    
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
            editor.setSize("100%", "500px");
        }
    });
</script>
@endsection

<style>
    /* Zorg ervoor dat de editor-container resizeable is */
    .editor-container {
        position: relative;
        width: 100%;
        height: 500px;  /* Pas de hoogte aan naar wens */
        resize: both;
        overflow: hidden;
    }

    /* Zorg ervoor dat de CodeMirror editor zich aanpast aan de container */
    .CodeMirror {
        height: 100%;
    }
</style>
