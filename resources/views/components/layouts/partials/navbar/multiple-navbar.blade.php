<script>
  Alpine.store('sidebarState', {
    isActive: false,

    handleSidebarActivation() {
      this.isActive = !this.isActive
    }
  })
</script>

@php
  $path = explode('.', Route::currentRouteName());
@endphp

<nav x-data
  class="flex items-center justify-between z-20 shadow-md fixed left-0 right-0 top-0 bg-white py-2 px-3 box-border">
  {{-- Hamburger Menu --}}
  @if ($path[0] != 'profile')
    <button @click="$store.sidebarState.handleSidebarActivation()"
      class="text-yellow-900 hover:rounded-full hover:bg-slate-200 p-2 md:hidden">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
        class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
    </button>
  @endif

  {{-- Logo Utm --}}
  <a href="{{ route('home') }}" class="w-40 hidden md:block">
    <img src="{{ url(asset('assets/img/logo-ult-utm.png')) }}" alt="">
  </a>

  <h1 class="text-xl font-semibold text-yellow-900 capitalize">{{ $path[0] == 'profile' ? $path[0] : $path[1] }}</h1>

  @if (Auth::check())
    {{-- Avatar Dropdown --}}
    <x-section.avatar-dropdown />
  @else
    <a wire:navigate href="{{ route('login') }}"
      class="ms-5 bg-amber-200 py-2 px-3 rounded-lg font-semibold shadow-lg hover:bg-amber-300 hover:scale-105 transition">Sign-In</a>
  @endif
</nav>
