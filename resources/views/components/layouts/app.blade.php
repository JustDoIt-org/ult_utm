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
    <livewire:styles />
    @stack('styles')
</head>

<body class="font-sans antialiased">
    <livewire:scripts />

    <header>
        <x-layouts.partials.navbar.multiple-navbar />
    </header>
    <main class="min-h-screen bg-yellow-100 mt-5 md:mt-10 min-w-[460px]">
        {{ $slot }}
    </main>
    @stack('scripts')
</body>

</html>
