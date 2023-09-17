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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @livewireStyles
    </head>
    <body class="font-sans antialiased bg-gray-100">
        <div class="h-fit min-w-full bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Content -->
            <main>
                <div x-data="{showToast : true }" x-init="setTimeout(() => showToast = false, 3000)" class="px-1 py-1 sm:ml-64 bg-white/50 rounded-lg mt-16">
                    @include('components.toast')
                    {{ $slot }}
                 </div>
            </main>
        </div>
        @livewireScripts
        @stack('scripts')
    </body>
</html>
