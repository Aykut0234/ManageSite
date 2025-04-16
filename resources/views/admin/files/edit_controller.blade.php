@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📝 Bewerken: {{ $name }}</h2>

    @if(session('success'))
        <div class="alert alert-success mt-2">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger mt-2">
            @foreach($errors->all() as $err)
                <p>{{ $err }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('admin.files.controller.update', ['name' => $name]) }}">
        @csrf
        <textarea id="code" name="content">{{ $content }}</textarea>
        <br>
        <button type="submit" class="btn btn-primary mt-3">Opslaan</button>
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
            editor.setSize("100%", "500px");
        }
    });
</script>
@endsection
