<nav x-data x-bind:class="$store.sidebarState.isActive ? 'translate-x-7 show' : '-translate-x-72 hide'" class="bg-white shadow-lg w-64 z-30 fixed top-0 bottom-0 my-5 rounded-[15px] transition-all overflow-y-auto overflow-x-hidden lg:show lg:translate-x-7">
    {{-- Logo Utm --}}
    <div class="sticky top-0 left-0 right-0 bg-white border-b-2 pt-5">
        <a href="{{ route('home') }}" class="w-full" >
            <img src="{{ url(asset('assets/img/logo-ult-utm.png')) }}" alt="Logo Ult Utm" class="w-44 pb-3 m-auto">
        </a>
    </div>
    {{ $slot }}
</nav>
