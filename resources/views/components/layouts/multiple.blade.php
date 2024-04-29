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

<body class="font-sans min-w-[345px] bg-yellow-100 text-gray-900 antialiased">
    <livewire:scripts />

    <header>
        <x-layouts.partials.navbar.multiple-navbar />
    </header>

    <aside>
        <x-layouts.partials.sidebar.sidebar>
            @if ($path = explode('.', Route::currentRouteName())[0] == "admin")
                <x-section.admin.admin-navigation />
            @endif

            @if ($path = explode('.', Route::currentRouteName())[0] == "visit")
                <x-section.visit.visit-navigation />
            @endif
        </x-layouts.partials.sidebar.sidebar>
    </aside>

    <main>
      <div x-data x-bind:class="$store.sidebarState.isActive && 'pointer-events-none'" class="sm:pl-64 pt-16 sm:pointer-events-auto">
        @yield('content')
      </div>
    </main>
</body>

</html>
