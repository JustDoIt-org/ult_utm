<nav x-data x-bind:class="$store.sidebarState.isActive ? 'translate-x-0 show' : '-translate-x-72 hide'" class="bg-white shadow-lg w-[80%] sm:w-60 z-10 fixed top-0 bottom-0 transition-all md:show md:translate-x-0 pt-16">
    {{-- Logo Utm --}}
    <a href="{{ route('home') }}" class="md:hidden">
        <img src="{{ url(asset('assets/img/logo-ult-utm.png')) }}" alt="Logo Ult Utm" class="w-44 pb-3">
    </a>
    {{ $slot }}
</nav>
