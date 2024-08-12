<nav x-data x-bind:class="$store.sidebarState.isActive ? 'translate-x-7 show' : '-translate-x-72 hide'" class="bg-white shadow-lg w-64 z-30 fixed top-0 bottom-0 my-5 rounded-[15px] transition-all lg:show lg:translate-x-7 pt-8">
    {{-- Logo Utm --}}
    <a href="{{ route('home') }}" class="w-full" >
        <img src="{{ url(asset('assets/img/logo-ult-utm.png')) }}" alt="Logo Ult Utm" class="w-44 pb-3 m-auto">
    </a>
    <hr>
    {{ $slot }}
</nav>
