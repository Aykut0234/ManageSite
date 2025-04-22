@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-card" style="max-width: 600px; margin: 40px auto;">
        <h1 style="font-size: 30px; font-weight: 700; color: #0d6efd; margin-bottom: 10px;">
            {{ __('donate.title') }}
        </h1>
        <p style="color: #475569; font-size: 16px; margin-bottom: 30px;">
            {{ __('donate.description') }}
        </p>

        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        <form action="{{ route('donatie.betalen') }}" method="POST" id="donatie-form">
            @csrf

            <div class="form-group">
                <label class="form-label">{{ __('donate.choose_amount') }}</label>
                <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 20px;">
                    @foreach([5, 10, 25, 50, 100] as $preset)
                        <button type="button" class="btn preset-btn" data-value="{{ $preset }}">
                            €{{ $preset }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="amount" class="form-label">{{ __('donate.or_enter') }}</label>
                <input type="number" id="amount" name="amount" step="0.01" min="1" class="form-control" placeholder="Bijv. 15.00" required>
            </div>

            <button type="submit" class="btn" style="margin-top: 20px; width: 100%;">
                {{ __('donate.button') }}
            </button>
        </form>

        <p style="text-align: center; color: #64748b; margin-top: 30px; font-size: 14px;">
            {{ __('donate.footer') }}
        </p>
    </div>
</div>

<script>
    document.querySelectorAll('.preset-btn').forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('amount').value = this.dataset.value;
        });
    });
</script>
@endsection
