@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="logo-settings-card">
            <h1 class="section-title">Logo Instellingen</h1>
            
            <form action="{{ route('admin.settings.logo.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="logo" class="form-label">Kies een logo:</label>
                    <input type="file" name="logo" id="logo" class="form-control">
                </div>

                <button type="submit" class="btn btn-upload mt-3">Upload Logo</button>
            </form>

            @if($setting && $setting->logo)
    <h3>Huidig Logo:</h3>
    <img src="{{ asset($setting->logo) }}" alt="Logo" class="img-fluid mt-3" style="max-height: 100px;">
@endif

        </div>
    </div>
@endsection
