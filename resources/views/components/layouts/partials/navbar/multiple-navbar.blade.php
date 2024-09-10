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


<nav x-data class="flex items-center justify-end z-20 absolute left-0 right-0 top-0 py-4 px-3 ">

  @if (Auth::check())
    <div class="flex items-center gap-3">
      {{-- Avatar Dropdown --}}
      <x-section.avatar-dropdown />

      {{-- Hamburger Menu --}}
      @if ($path[0] != 'profile')
        <button @click="$store.sidebarState.handleSidebarActivation()"
          class="text-white hover:rounded-full hover:bg-slate-200 p-2 lg:hidden">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
          </svg>
        </button>
      @endif
    </div>
  @else
    <a wire:navigate href="{{ route('login') }}"
      class="ms-5 bg-primary text-white py-2 px-3 rounded-lg font-semibold shadow-lg hover:bg-blue-300 hover:scale-105 transition">Sign-In</a>
  @endif
</nav>
