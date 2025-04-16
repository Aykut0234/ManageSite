<div class="admin-layout" style="display: flex; min-height: 100vh;">

    {{-- Sidebar --}}
    @include('components.admin-sidebar')

    {{-- Content --}}
    <div class="admin-content" style="flex: 1; padding: 20px;">
        @yield('content')
    </div>
</div>
