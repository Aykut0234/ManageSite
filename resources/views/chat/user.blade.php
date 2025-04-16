@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-card">

        <h2 style="font-size: 28px; color: #1e293b; margin-bottom: 20px;">💬 Chat met de administratie</h2>

        <!-- Chatweergave -->
        <div style="max-height: 400px; overflow-y: auto; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; background-color: #f8fafc; margin-bottom: 24px;">
            @forelse($messages as $msg)
                <div style="margin-bottom: 16px;">
                    <div style="background-color: {{ $msg->is_admin_sender ? '#f1f5f9' : '#dbeafe' }};
                                color: #1e293b;
                                padding: 12px 16px;
                                border-radius: 10px;
                                max-width: 75%;
                                @if(!$msg->is_admin_sender) margin-left: auto; text-align: right; @endif">
                        <div style="font-weight: 600; margin-bottom: 4px;">
                            {{ $msg->is_admin_sender ? '👨‍💼 Admin' : '🧍 Jij' }}
                        </div>
                        <div>{{ $msg->message }}</div>
                        <div style="font-size: 12px; color: #64748b; margin-top: 6px;">
                            {{ $msg->created_at->format('d-m-Y H:i') }}
                        </div>
                    </div>
                </div>
            @empty
                <p style="color: #64748b;">Er zijn nog geen berichten.</p>
            @endforelse
        </div>

        <!-- Chatformulier -->
        <form action="{{ route('chat.user.send') }}" method="POST">
            @csrf
            <label for="message">✍️ Bericht</label>
            <textarea name="message" class="form-control" rows="3" required style="margin-top: 8px; margin-bottom: 16px;"></textarea>
            <button type="submit" class="btn">Verstuur</button>
        </form>

    </div>
</div>
@endsection
