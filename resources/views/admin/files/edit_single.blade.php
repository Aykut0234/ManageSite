@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📝 Bewerken: {{ $name }}</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ $route }}">
        @csrf
        <textarea id="code" name="content">{{ old('content', $content) }}</textarea>
        <br>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection

@section('scripts')
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

        if (filename.includes('.css')) mode = "css";
        else if (filename.includes('.blade.php')) mode = "htmlmixed";
        else if (filename.includes('.js')) mode = "javascript";

        const editor = CodeMirror.fromTextArea(document.getElementById("code"), {
            lineNumbers: true,
            mode: mode,
            theme: "material-darker",
            tabSize: 4,
            indentUnit: 4,
            indentWithTabs: true,
        });

        editor.setSize("100%", "500px");
    });
</script>
@endsection
