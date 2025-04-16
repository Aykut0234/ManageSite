<div class="layout-wrapper">

    {{-- Header --}}
    @include('components.header')

    {{-- Content --}}
    <main class="content">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.footer')

</div>
