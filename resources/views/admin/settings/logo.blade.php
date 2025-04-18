@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Logo Instellingen</h1>

        <form action="{{ route('admin.settings.logo.upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="logo">Kies een logo:</label>
                <input type="file" name="logo" id="logo" class="form-control">
            </div>
            <button type="submit" class="btn btn-upload mt-3">Upload Logo</button>
        </form>

        <h3>Geüploade Logo's:</h3>
        <div class="logos-list">
            @foreach ($logos as $logo)
                <img src="{{ asset('storage/logos/' . $logo->getFilename()) }}" alt="Logo" class="img-fluid mt-3" style="max-height: 100px;">
            @endforeach
        </div>
    </div>
@endsection
