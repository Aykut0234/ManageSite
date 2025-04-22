@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">
        <h1 style="font-size: 32px; margin-bottom: 20px; color: #1e293b;">{{ __('positions_title') }}</h1>
        <p style="font-size: 18px; color: #475569; margin-bottom: 30px;">{{ __('positions_intro') }}</p>

        <div style="display: flex; flex-direction: column; gap: 32px;">
            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 8px;">{{ __('position_sustainability') }}</h2>
                <p style="color: #334155;">{{ __('position_sustainability_text') }}</p>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 8px;">{{ __('position_accessibility') }}</h2>
                <p style="color: #334155;">{{ __('position_accessibility_text') }}</p>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 8px;">{{ __('position_local') }}</h2>
                <p style="color: #334155;">{{ __('position_local_text') }}</p>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 8px;">{{ __('position_education') }}</h2>
                <p style="color: #334155;">{{ __('position_education_text') }}</p>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 8px;">{{ __('position_inclusion') }}</h2>
                <p style="color: #334155;">{{ __('position_inclusion_text') }}</p>
            </section>
        </div>
    </div>
</div>
@endsection
