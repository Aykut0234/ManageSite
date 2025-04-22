@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">

        <h1 style="font-size: 32px; color: #1e293b; margin-bottom: 20px;"> {{ __('contact_page.title') }}</h1>
        <p style="font-size: 18px; color: #475569; margin-bottom: 30px;">
            {{ __('contact_page.intro') }}
        </p>

        <div style="display: flex; flex-direction: column; gap: 32px;">

            <section class="contact-card">
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">📞 {{ __('contact_page.contact_info') }}</h2>
                <ul style="list-style: none; padding: 0; color: #334155; font-size: 16px;">
                    <li style="margin-bottom: 8px;"><strong>📧 {{ __('contact_page.email') }}</strong> info@beveiligingsexpert.nl</li>
                    <li style="margin-bottom: 8px;"><strong>📱 {{ __('contact_page.phone') }}</strong> 085 - 123 45 67</li>
                    <li style="margin-bottom: 8px;"><strong>🏢 {{ __('contact_page.address') }}</strong> Voorbeeldstraat 123, 1234 AB Amsterdam</li>
                    <li><strong>📮 {{ __('contact_page.postal') }}</strong> Postbus 456, 1000 AB Amsterdam</li>
                </ul>
            </section>

            <section class="contact-card">
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">🕒 {{ __('contact_page.hours') }}</h2>
                <ul style="list-style: none; padding: 0; color: #334155; font-size: 16px;">
                    <li style="margin-bottom: 8px;">{{ __('contact_page.weekdays') }}</li>
                    <li>{{ __('contact_page.weekend') }}</li>
                </ul>
            </section>

            <section class="contact-card">
                <p style="color: #475569; font-size: 16px;">
                    {{ __('contact_page.response_time') }}
                </p>
            </section>

        </div>

    </div>
</div>
@endsection
