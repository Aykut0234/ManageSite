@extends('layouts.app')

@section('content')
<div class="container">
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: 12px; padding: 40px; box-shadow: 0 4px 16px rgba(0,0,0,0.04);">

        <h1 style="font-size: 32px; margin-bottom: 20px; color: #1e293b;">
            {{ __('about_page.title') }}
        </h1>

        <p style="font-size: 18px; color: #475569; margin-bottom: 30px;">
            {!! str_replace('{{name}}', config('app.name', 'Onze Organisatie'), __('about_page.intro')) !!}
        </p>

        <div style="display: flex; flex-direction: column; gap: 32px;">

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">
                    {{ __('about_page.mission_title') }}
                </h2>
                <p style="color: #334155;">
                    {{ __('about_page.mission_text') }}
                </p>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">
                    {{ __('about_page.whatwedo_title') }}
                </h2>
                <ul style="list-style: disc; padding-left: 20px; color: #334155;">
                    @foreach(__('about_page.whatwedo_list') as $item)
                        <li style="margin-bottom: 8px;">{{ $item }}</li>
                    @endforeach
                </ul>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">
                    {{ __('about_page.team_title') }}
                </h2>
                <p style="color: #334155;">
                    {{ __('about_page.team_text') }}
                </p>
            </section>

            <section>
                <h2 style="font-size: 24px; color: #1d4ed8; margin-bottom: 12px;">
                    {{ __('about_page.location_title') }}
                </h2>
                <p style="color: #334155;">
                    {{ __('about_page.location_text') }}
                </p>
            </section>

            <section>
                <p style="color: #475569;">
                    {!! str_replace(':url', route('contact'), __('about_page.contact')) !!}
                </p>
            </section>

        </div>
    </div>
</div>
@endsection
