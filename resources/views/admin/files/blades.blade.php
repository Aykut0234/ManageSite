@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📂 Blade-bestanden</h2>
    <ul>
        @foreach ($bladeFiles as $file)
            <li>
                 <a href="{{ route('admin.files.blade.create') }}" class="btn btn-primary mb-3">+ Nieuw bestand</a>

                <a href="{{ route('admin.files.blade.edit', ['name' => $file['name']]) }}">
                    {{ $file['name'] }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
