@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-card">

        <h2 style="font-size: 28px; color: #1e293b; margin-bottom: 20px;">📂 Alle Controllers</h2>

        @if(session('success'))
            <div class="alert alert-success" style="margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        @if (count($files) > 0)
            <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 16px;">
                @foreach($files as $file)
                    <li style="background-color: #f9fafb; padding: 16px 20px; border: 1px solid #e2e8f0; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.02); transition: box-shadow 0.2s;">
                        <a href="{{ route('admin.files.controller.edit', ['name' => urlencode($file->getRelativePathname())]) }}" class="btn-link" style="font-size: 16px;">
                            {{ $file->getRelativePathname() }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p style="color: #64748b;">Er zijn nog geen controllerbestanden gevonden.</p>
        @endif

    </div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary" style="margin-bottom: 20px;">
        ← Terug
    </a>
    
</div>


@endsection
