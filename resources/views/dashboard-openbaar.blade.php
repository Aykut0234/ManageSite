@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);">
        <h1 style="font-size: 32px; margin-bottom: 10px; color: #1e293b;">👋 {{ __('welcome_message') }}</h1>
        <p style="font-size: 18px; color: #475569; margin-bottom: 30px;">
            {{ __('description') }}
        </p>

        <div>
            <h3 style="font-size: 22px; margin-bottom: 16px; color: #1d4ed8;">{{ __('what_can_you_do') }}</h3>
            <ul style="list-style: none; padding-left: 0; color: #334155;">
                <li style="margin-bottom: 10px;">
                    🔍 {{ __('project_overview') }} <a href="#" class="btn-link">{{ __('project_overview') }}</a>
                </li>
                <li style="margin-bottom: 10px;">
                    📖 {{ __('about_us') }} <a href="#" class="btn-link">{{ __('about_us') }}</a>
                </li>
                <li style="margin-bottom: 10px;">
                    🗓️ {{ __('news_and_agenda') }} <a href="#" class="btn-link">{{ __('news_and_agenda') }}</a>
                </li>
                <li style="margin-bottom: 10px;">
                    ✅ {{ __('want_to_join') }} 
                    <a href="{{ route('register') }}" class="btn-link">{{ __('register') }}</a> 
                    of 
                    <a href="{{ route('login') }}" class="btn-link">{{ __('login') }}</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
