@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Steun ons project</h1>
    <form action="{{ route('donatie.betalen') }}" method="POST">
        @csrf
        <div>
            <label>Bedrag (€)</label>
            <input type="number" name="amount" step="0.01" min="1" required>
        </div>
        <button type="submit">Betaal met Mollie</button>
    </form>
</div>
@endsection
