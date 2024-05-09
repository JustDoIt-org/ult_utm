@props(['items'])

<header class="sticky top-0 py-3 px-6 w-screen bg-slate-100/80 rounded-b-2xl backdrop-blur-sm z-10 lg:px-20"
  x-data="{ mobileNav: false }">
  <nav class="flex items-center">
    <div class="w-full flex items-center gap-3">
        <button class="flex items-center justify-center w-10 h-10 bg-slate-300 rounded-full shadow-lg lg:hidden"
          @click="mobileNav = !mobileNav"><i
            class="fa-solid fa-bars fa-sm"></i></button>

        <a href="#"><img src="./assets/img/logo-ult-utm.png" class="h-14" alt="Logo Unit Layanan Terpadu UTM"></a>
    </div>

    <div class="ms-auto hidden lg:flex items-center">
        <x-layouts.partials.navbar.list-link :$items />
    </div>

    @if (Auth::check())
        <div class="ml-10 whitespace-nowrap">
            {{-- Avatar Dropdown--}}
            <x-section.avatar-dropdown />
        </div>
    @else
        <a wire:navigate href="{{route('login')}}"
            class="ms-5 bg-amber-200 py-2 px-3 rounded-lg font-semibold shadow-lg hover:bg-amber-300 hover:scale-105 transition whitespace-nowrap">Sign-In</a>
    @endif
  </nav>

  <!-- Mobile NavBar -->
  <nav class="fixed lg:hidden top-0 bottom-0 left-0 right-0 backdrop-blur-sm z-10" :hidden="!mobileNav">
    <div class="flex pt-3 pb-5 px-6 flex-col bg-slate-100 rounded-2xl shadow-lg">

        <div class="flex gap-3 items-center w-full">
            <button class="flex justify-center items-center w-10 h-10 bg-slate-300 rounded-full shadow-lg lg:hidden"
            @click="mobileNav = !mobileNav"><i
                class="fa-solid fa-xmark fa-sm"></i></button>
            <a href="#"><img src="./assets/img/logo-ult-utm.png" class="h-14"
                alt="Logo Unit Layanan Terpadu UTM"></a>
        </div>

      <hr class="border-slate-300 mt-5">
      <ul class="flex flex-col gap-y-4 mt-5">
        @foreach ($items as $item)
          <li>
            <a wire:navigate href="{{ $item['link'] }}"
              class="border-transparent hover:border-b-4 hover:pb-1 hover:border-b-slate-700 transition duration-700">{{ $item['name'] }}</a>
          </li>
        @endforeach
      </ul>
      {{-- <x-layouts.partials.navbar.list-link :$items :$type="mobile" /> --}}
    </div>
  </nav>
</header>
