@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-card">

        <div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; margin-bottom: 30px;">
            <h2 style="font-size: 28px; color: #1e293b;">📂 Blade-bestanden</h2>
            <a href="{{ route('admin.files.blade.create') }}" class="btn">
                + Nieuw bestand
            </a>
        </div>

        @if (count($bladeFiles) > 0)
            <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 16px;">
                @foreach ($bladeFiles as $file)
                    <li style="background-color: #f9fafb; padding: 16px 20px; border: 1px solid #e2e8f0; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.02); transition: box-shadow 0.2s;">
                        <a href="{{ route('admin.files.blade.edit', ['name' => $file['name']]) }}">
                            {{ $file['name'] }}
                        </a>
                        
                    </li>
                @endforeach
            </ul>
        @else
            <p style="color: #64748b;">Er zijn nog geen Blade-bestanden beschikbaar.</p>
        @endif

    </div>
    <a href="{{ url()->previous() }}" class="btn btn-secondary" style="margin-bottom: 20px;">
        ← Terug
    </a>
    
</div>

@endsection
