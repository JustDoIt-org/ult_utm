<nav x-data x-bind:class="!$store.sidebar.isActive ? '-translate-x-[400px] hide' : 'translate-x-0 show' " class="bg-white transition-all w-[90%] shadow-md fixed top-[56px] bottom-0 md:w-72 md:show md:translate-x-0">
    {{ $slot }}
</nav>
