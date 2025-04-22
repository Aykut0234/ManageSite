@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Doneer voor onze website</h1>

        <form action="{{ route('donation.create') }}" method="POST">
            @csrf
            <div>
                <label for="amount">Bedrag</label>
                <input type="number" name="amount" id="amount" required min="1" step="any">
            </div>
            <button type="submit">Doneer</button>
        </form>
    </div>
@endsection
