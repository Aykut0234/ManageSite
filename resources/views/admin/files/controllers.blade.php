@extends('layouts.app')

@section('content')
<div class="container">
    <h2>📂 Alle Controllers</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <ul>
        @foreach($files as $file)
            <li>
                <a href="{{ route('admin.files.controller.edit', ['name' => urlencode($file->getRelativePathname())]) }}">
                    {{ $file->getRelativePathname() }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
