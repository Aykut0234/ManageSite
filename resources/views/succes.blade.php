@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-card" style="max-width: 600px; margin: 60px auto; text-align: center;">
        <div style="font-size: 48px; color: #10b981; margin-bottom: 20px;">
            ✅
        </div>
        <h1 style="font-size: 28px; font-weight: 700; color: #1e293b; margin-bottom: 10px;">
            {{ __('donate.success.title') }}
        </h1>
        <p style="color: #475569; font-size: 16px; margin-bottom: 30px;">
            {{ __('donate.success.message') }}
        </p>

        <a href="{{ route('dashboard.openbaar') }}" class="btn" style="width: 100%; max-width: 280px;">
            {{ __('donate.success.back') }}
        </a>
    </div>
</div>
@endsection
