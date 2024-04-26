<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tailwind Test</title>
        @vite('resources/css/app.css')
    </head>

    <body>
        @livewireScripts

        <header>
            <x-navbar-menu />
        </header>
        <aside>
            <x-sidebar-menu>
                @if (request()->routeIs("/admin"))
                    @include('admin.components.admin-navigations')
                @else
                    @include('admin.components.admin-navigations')
                @endif
            </x-sidebar-menu>
        </aside>
        <main>
            @yield('content')
        </main>
    </body>
</html>
