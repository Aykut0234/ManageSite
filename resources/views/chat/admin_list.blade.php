@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-card">
        <h2 style="font-size: 28px; color: #1e293b; margin-bottom: 20px;">💬 Chats met gebruikers</h2>

        @if($users->count())
            <ul style="list-style: none; padding-left: 0; display: flex; flex-direction: column; gap: 16px;">
                @foreach($users as $user)
                    <li style="background-color: #f9fafb; padding: 16px 20px; border: 1px solid #e2e8f0; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,0.02); transition: box-shadow 0.2s;">
                        <a href="{{ route('chat.admin.view', $user->id) }}" class="btn-link" style="font-size: 16px;">
                            👤 {{ $user->name }} <span style="color: #64748b;">({{ $user->email }})</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p style="color: #64748b;">Er zijn nog geen gebruikers met chatgesprekken.</p>
        @endif
    </div>
</div>
@endsection
