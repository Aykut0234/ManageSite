@extends('layouts.app')

@section('content')
<div class="container">
    <div class="info-card">
        <h2 class="section-title">🌐 Gebruikerslijst</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Naam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Telefoonnummer</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->last_name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
