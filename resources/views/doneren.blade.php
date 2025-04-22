@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-card" style="max-width: 600px; margin: 40px auto;">
        <h1 style="font-size: 30px; font-weight: 700; color: #0d6efd; margin-bottom: 10px;">
            Steun ons initiatief!
        </h1>
        <p style="color: #475569; font-size: 16px; margin-bottom: 30px;">
            Kies een bedrag of vul zelf in wat je wil doneren. We zijn dankbaar voor elke bijdrage!
        </p>

        @if(session('error'))
            <div class="alert-error">{{ session('error') }}</div>
        @endif

        <form action="{{ route('donatie.betalen') }}" method="POST" id="donatie-form">
            @csrf

            <div class="form-group">
                <label class="form-label">Kies een bedrag:</label>
                <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 20px;">
                    @foreach([5, 10, 25, 50, 100] as $preset)
                        <button type="button" class="btn preset-btn" data-value="{{ $preset }}">
                            €{{ $preset }}
                        </button>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                <label for="amount" class="form-label">Of vul een eigen bedrag in (€):</label>
                <input type="number" id="amount" name="amount" step="0.01" min="1" class="form-control" placeholder="Bijv. 15.00" required>
            </div>

            <button type="submit" class="btn" style="margin-top: 20px; width: 100%;">
                ❤️ Doneer met Mollie
            </button>
        </form>

        <p style="text-align: center; color: #64748b; margin-top: 30px; font-size: 14px;">
            Veilig betalen via iDEAL, Bancontact, PayPal en meer.
        </p>
    </div>
</div>

<script>
    // Preset knoppen gedrag
    document.querySelectorAll('.preset-btn').forEach(button => {
        button.addEventListener('click', function () {
            document.getElementById('amount').value = this.dataset.value;
        });
    });
</script>
@endsection
