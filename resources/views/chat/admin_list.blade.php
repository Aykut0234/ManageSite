@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chats met gebruikers</h2>

    <ul>
        @forelse($users as $user)
            <li>
                <a href="{{ route('chat.admin.view', $user->id) }}">
                    {{ $user->name }} ({{ $user->email }})
                </a>
            </li>
        @empty
            <p>Geen gebruikers met chatgesprekken.</p>
        @endforelse
    </ul>
</div>
@endsection
