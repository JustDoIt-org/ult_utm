<script>
  Alpine.store('sidebarState', {
    isActive: false,

    handleSidebarActivation() {
      this.isActive = !this.isActive
    }
  })
</script>

@php
    $path = explode('.', Route::currentRouteName())[1]
@endphp

<nav x-data class="flex items-center justify-between z-10 fixed left-0 right-0 bg-white py-2 px-3">
  {{-- Hamburger Menu --}}
  <button @click="$store.sidebarState.handleSidebarActivation()" class="text-yellow-900 hover:rounded-full hover:bg-slate-200 p-2 sm:hidden">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
      </svg>
  </button>

  <h1 class="hidden sm:block font-bold text-yellow-600">LOGO COMPANY</h1>

  <h1 class="text-xl font-semibold text-yellow-900 capitalize">{{ $path }}</h1>

  {{-- Avatar Dropdown --}}
  <div class="flex justify-center items-center font-semibold text-white bg-yellow-600 w-11 h-11 rounded-full">A</div>
</nav>
