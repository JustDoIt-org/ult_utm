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

<body class="flex justify-center items-center bg-yellow-50 md:min-w-[835px] py-7 overflow-x-hidden">
    <section class="flex flex-col gap-1 mx-5 justify-center h-screen">
        {{-- Logo Utm --}}
        <a wire:navigate href="{{ route('home') }}" class="flex justify-center md:justify-start">
            <img src="{{ url(asset('assets/img/logo-ult-utm.png')) }}" alt="Logo Ult Utm" class="w-44 pb-3">
        </a>
        <div class="mx-auto md:px-14 bg-white rounded-lg shadow-lg px-5 py-5 md:py-10">
            {{ $slot }}
        </div>
    </section>

    <livewire:scripts />
</body>

</html>
