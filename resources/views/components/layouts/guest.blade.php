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
</head>

<body class="bg-yellow-50 px-10 min-w-[498px] md:min-w-[835px] py-7 md:py-0">
    <section class="flex flex-col justify-center h-screen">
        {{-- Logo Utm --}}
        <a wire:navigate href="{{ route('home') }}" class="flex justify-center md:justify-start">
            <img src="{{ url(asset('assets/img/logo-ult-utm.png')) }}" alt="Logo Ult Utm" class="w-44 pb-3">
        </a>
        <div class="min-w-[350px] w-[400px] mx-auto md:w-auto md:px-14 bg-white rounded-lg shadow-lg px-5 py-5 md:py-10">
            {{ $slot }}
        </div>
    </section>

    <livewire:scripts />
</body>

</html>
