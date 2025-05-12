@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px; box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);">
        
        <h1 style="font-size: 32px; color: #1e293b; margin-bottom: 20px;">📰 {{ __('news_page.title') }}</h1>
        <p style="font-size: 18px; color: #475569; margin-bottom: 30px;">
            {{ __('news_page.intro') }}
        </p>

        <div style="display: flex; flex-direction: column; gap: 32px;">

            <div class="news-card">
                <h2 class="news-title">📢 {{ __('news_page.item1.title') }}</h2>
                <p class="news-date">{{ __('news_page.item1.date') }}</p>
                <p>{{ __('news_page.item1.text') }}</p>
            </div>

            <div class="news-card">
                <h2 class="news-title">🚨 {{ __('news_page.item2.title') }}</h2>
                <p class="news-date">{{ __('news_page.item2.date') }}</p>
                <p>
                    {!! __('news_page.item2.text') !!}
                </p>
            </div>

            <div class="news-card">
                <h2 class="news-title">💬 {{ __('news_page.item3.title') }}</h2>
                <p class="news-date">{{ __('news_page.item3.date') }}</p>
                <p>{{ __('news_page.item3.text') }}</p>
            </div>

        </div>
    </div>
</div>
@endsection
