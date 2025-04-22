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

        <h3 class="mt-4">Geüploade Logo's:</h3>
        <div class="row">
            @foreach ($logos as $logo)
                <div class="col-md-2 col-sm-4 col-6 mt-3">
                    <div class="logo-container">
                        <img src="{{ asset('storage/logos/' . $logo->getFilename()) }}" alt="Logo" class="img-fluid" style="max-height: 100px;">
                        <!-- Delete button -->
                        <form action="{{ route('admin.settings.logo.delete', ['filename' => $logo->getFilename()]) }}" method="POST" style="margin-top: 5px;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Verwijderen</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
