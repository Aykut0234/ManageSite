@extends('layouts.app')

@section('content')
<div class="container">
    <h2>➕ Nieuw Blade-bestand aanmaken</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                <p>{{ $err }}</p>
            @endforeach
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form method="POST" action="{{ route('admin.files.blade.store') }}">
        @csrf

        <div class="mb-3">
            <label for="folder" class="form-label">Mapnaam (optioneel):</label>
            <input type="text" name="folder" id="folder" class="form-control" placeholder="bijv: pagina's of leeg laten">
        </div>

        <div class="mb-3">
            <label for="filename" class="form-label">Bestandsnaam (zonder `.blade.php`):</label>
            <input type="text" name="filename" id="filename" class="form-control" required placeholder="bijv: contact">
        </div>

        <div class="mb-3">
            <label for="code" class="form-label">Inhoud van bestand:</label>
            <textarea name="content" id="code" class="form-control" rows="15"></textarea>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3">
    <button type="submit" class="btn btn-success">➕ Aanmaken</button>
    <a href="{{ request()->headers->get('referer') }}" class="btn btn-secondary mt-3">
        ← Terug
    </a>
</div>

    
    </form>
  
</div>
@endsection

@section('scripts')
<!-- ✅ CodeMirror styling en scripts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/theme/material-darker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/htmlmixed/htmlmixed.min.js"></script>

<script>
    const editor = CodeMirror.fromTextArea(document.getElementById("code"), {
        lineNumbers: true,
        mode: "htmlmixed",
        theme: "material-darker",
        tabSize: 4,
        indentUnit: 4,
        indentWithTabs: true,
    });
    editor.setSize("100%", "400px");
</script>
@endsection

