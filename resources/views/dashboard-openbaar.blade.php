@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Welkom op onze website</h1>

    <p>
        Dit is het openbare dashboard. Iedereen — of je nu ingelogd bent of niet — kan deze pagina bekijken.
    </p>

    <div style="margin-top: 30px;">
        <h3>Wat kun je hier doen?</h3>
        <ul>
            <li>Bekijk ons <a href="#">ahmed</a></li>
            <li>Lees meer <a href="#">over ons</a></li>
            <li>Bekijk de <a href="#">nieuws & agenda</a></li>
            <li>Wil je meedoen? <a href="{{ route('register') }}">Registreer je</a> of <a href="{{ route('login') }}">log in</a></li>
        </ul>
    </div>
</div>
@endsection