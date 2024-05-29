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

    <!-- Full Calendar -->
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <livewire:styles />
</head>

<body class="font-sans min-w-[345px] bg-yellow-100 text-gray-900 antialiased">
    <livewire:scripts />

    <header>
        <x-layouts.partials.navbar.multiple-navbar />
    </header>

    <aside>
        @if (Auth::check())
            <x-layouts.partials.sidebar.sidebar>
                @switch(explode('.', Route::currentRouteName())[0])
                    @case("admin")
                        <x-section.admin.admin-navigation />
                        @break
                    @case("visit")
                        <x-section.visit.visit-navigation />
                        @break
                    @case("ppid")
                        <x-section.ppid.ppid-navigation />
                        @break
                    @default
                @endswitch
            </x-layouts.partials.sidebar.sidebar>
        @endif
    </aside>

    <main class="box-border">
        @if (Auth::check())
            <div x-data x-bind:class="$store.sidebarState.isActive && 'pointer-events-none'" class="md:pl-60 pt-16 md:pointer-events-auto overflow-x-hidden">
        @else
            <div class="py-10 px-24">
        @endif
        @yield('content')
      </div>
    </main>
</body>

</html>
