@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Chat met gebruiker #{{ $userId }}</h2>

    <div style="max-height: 400px; overflow-y: auto; border: 1px solid #ccc; padding: 15px; margin-bottom: 20px;">
        @forelse($messages as $msg)
            <div style="margin-bottom: 10px;">
                <strong>{{ $msg->is_admin_sender ? 'Admin' : 'Gebruiker' }}:</strong>
                {{ $msg->message }}
                <br>
                <small>{{ $msg->created_at->format('d-m-Y H:i') }}</small>
            </div>
        @empty
            <p>Geen berichten in deze chat.</p>
        @endforelse
    </div>

    <form action="{{ route('chat.admin.send', $userId) }}" method="POST">
        @csrf
        <textarea name="message" class="form-control" rows="3" required></textarea>
        <br>
        <button type="submit" class="btn btn-primary">Verstuur</button>
    </form>
</div>
@endsection
