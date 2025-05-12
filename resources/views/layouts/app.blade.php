<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Breeze/Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="layout-wrapper" style="min-height: 100vh; display: flex; flex-direction: column;">
        @include('components.header')

        @auth
            @role('admin')
                <div class="admin-layout" style="flex: 1; display: flex;">
                    @include('components.admin-sidebar')
                    

                    <main class="admin-content" style="flex: 1; padding: 20px;">
                        @yield('content')
                    </main>
                </div>
            @else
                <main class="content" style="flex: 1;">
                    @yield('content')
                    
                </main>
            @endrole
        @else
            <main class="content" style="flex: 1;">
                @yield('content')
            </main>
        @endauth

    </div>

    <!-- CodeMirror (indien gebruikt op adminpagina's) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/theme/material-darker.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/codemirror.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.65.16/mode/php/php.min.js"></script>

    <!-- Dropdown script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const trigger = document.getElementById('dropdownTrigger');
            const menu = document.getElementById('dropdownMenu');

            if (trigger && menu) {
                menu.style.display = 'none';

                trigger.addEventListener('click', function (e) {
                    e.preventDefault();
                    menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
                });

                document.addEventListener('click', function (e) {
                    if (!trigger.contains(e.target) && !menu.contains(e.target)) {
                        menu.style.display = 'none';
                    }
                });
            }
        });

        function toggleSidebarDropdown() {
            const dropdown = document.getElementById('sidebarDropdown');
            dropdown.style.display = (dropdown.style.display === 'none' || dropdown.style.display === '') ? 'flex' : 'none';
        }
    </script>

    @yield('scripts')
</body>
</html>
