@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-card">
        <!-- Gebruikersgegevens -->
        <div style="margin-bottom: 24px;">
            <h2 style="font-size: 28px; color: #1e293b; margin-bottom: 16px;">👤 Welkom, {{ Auth::user()->name }}</h2>
            <div style="font-size: 16px; color: #64748b;">
                <p><strong>E-mail:</strong> {{ Auth::user()->email }}</p>
                <!-- Voeg andere gewenste gebruikersgegevens toe -->
            </div>
        </div>

        <!-- Chatweergave -->
        <h3 style="font-size: 24px; color: #1e293b; margin-bottom: 16px;">💬 Chat met de administratie</h3>

        <div style="max-height: 400px; overflow-y: auto; border: 1px solid #e2e8f0; border-radius: 8px; padding: 20px; background-color: #f8fafc; margin-bottom: 24px;">
            @forelse($messages as $msg)
                <div style="margin-bottom: 16px; display: flex; flex-direction: {{ $msg->is_admin_sender ? 'row' : 'row-reverse' }};">
                    <div style="background-color: {{ $msg->is_admin_sender ? '#f1f5f9' : '#dbeafe' }};
                                color: #1e293b;
                                padding: 12px 16px;
                                border-radius: 10px;
                                max-width: 75%; 
                                width: fit-content;">
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
            <div>
                <label for="message" style="font-size: 18px; color: #1e293b;">✍️ Bericht versturen</label>
                <textarea name="message" class="form-control" rows="3" required style="margin-top: 8px; margin-bottom: 16px; padding: 12px; font-size: 16px;"></textarea>
            </div>
            <button type="submit" class="btn" style="padding: 12px 20px;">Verstuur bericht</button>
        </form>
    </div>
</div>
@endsection
