@props(['items'])

<header class="sticky top-0 py-3 px-6 w-screen bg-slate-100/80 rounded-b-2xl backdrop-blur-sm z-10 lg:px-20"
  x-data="{ mobileNav: false }">
  <nav class="flex items-center">
    <a href="#"><img src="./assets/img/logo-ult-utm.png" class="h-14" alt="Logo Unit Layanan Terpadu UTM"></a>
    <div class="ms-auto hidden lg:flex items-center">

      <x-layouts.partials.navbar.list-link :$items />

        @if (Auth::check())
            {{-- Avatar Dropdown --}}
            <div class="ml-10">
                <x-element.dropdown.container>
                    <x-slot:trigger>
                        <button class="flex items-center gap-3">
                            <div class="flex justify-center items-center font-semibold text-white bg-yellow-600 w-9 h-9 rounded-full uppercase">
                                {{ Auth::user()->name[0] }}
                            </div>

                            <div class="hidden md:flex md:items-center">
                                <div class="font-semibold text-sm">{{ Auth::user()->name }}</div>

                                <div class="ml-1 text-slate-400">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </button>
                    </x-slot:trigger>

                    <x-slot:content>
                        <div class="text-sm px-1 py-2 mb-2 border-b-2">
                            <h1 class="font-semibold">{{ Auth::user()->name }}</h1>
                            <h4 class="text-slate-400">{{ Auth::user()->email }}</h4>
                        </div>

                        @if (auth()->user()->roles->first()->name == App\Models\Role::ADMIN)

                            <x-element.dropdown.link :href="route('admin.dashboard')">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 0 1-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0 1 15 18.257V17.25m6-12V15a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 15V5.25m18 0A2.25 2.25 0 0 0 18.75 3H5.25A2.25 2.25 0 0 0 3 5.25m18 0V12a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 12V5.25" />
                                    </svg>
                                    {{ __('Dashboard') }}
                                </div>
                            </x-element.dropdown.link>

                        @endif

                        <x-element.dropdown.link :href="route('profile.edit')">
                            <div class="flex items-center gap-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path fill-rule="evenodd" d="M18.685 19.097A9.723 9.723 0 0 0 21.75 12c0-5.385-4.365-9.75-9.75-9.75S2.25 6.615 2.25 12a9.723 9.723 0 0 0 3.065 7.097A9.716 9.716 0 0 0 12 21.75a9.716 9.716 0 0 0 6.685-2.653Zm-12.54-1.285A7.486 7.486 0 0 1 12 15a7.486 7.486 0 0 1 5.855 2.812A8.224 8.224 0 0 1 12 20.25a8.224 8.224 0 0 1-5.855-2.438ZM15.75 9a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z" clip-rule="evenodd" />
                                </svg>
                                {{ __('Profile') }}
                            </div>
                        </x-element.dropdown.link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button onclick="event.preventDefault(); this.closest('form').submit();" class="block w-full px-1 py-2 text-left text-sm leading-5 text-slate-400 hover:text-yellow-600 hover:font-semibold hover:bg-yellow-50 hover:border-l-4 hover:border-yellow-500 focus:bg-yellow-50 focus:text-yellow-600 focus:font-semibold focus:border-l-4 focus:border-yellow-500 transition duration-150 ease-in-out rounded-lg">
                                <div class="flex items-center gap-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                        <path fill-rule="evenodd" d="M16.5 3.75a1.5 1.5 0 0 1 1.5 1.5v13.5a1.5 1.5 0 0 1-1.5 1.5h-6a1.5 1.5 0 0 1-1.5-1.5V15a.75.75 0 0 0-1.5 0v3.75a3 3 0 0 0 3 3h6a3 3 0 0 0 3-3V5.25a3 3 0 0 0-3-3h-6a3 3 0 0 0-3 3V9A.75.75 0 1 0 9 9V5.25a1.5 1.5 0 0 1 1.5-1.5h6ZM5.78 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 0 0 0 1.06l3 3a.75.75 0 0 0 1.06-1.06l-1.72-1.72H15a.75.75 0 0 0 0-1.5H4.06l1.72-1.72a.75.75 0 0 0 0-1.06Z" clip-rule="evenodd" />
                                    </svg>
                                    {{ __('Log Out') }}
                                </div>
                            </button>
                        </form>
                    </x-slot:content>
                </x-element.dropdown.container>
            </div>
        @else
            <a wire:navigate href="{{route('login')}}"
                class="ms-5 bg-amber-200 py-2 px-3 rounded-lg font-semibold shadow-lg hover:bg-amber-300 hover:scale-105 transition">Sign-In</a>
        @endif
    </div>
    <button class="ms-auto w-10 h-10 bg-slate-300 rounded-full shadow-lg relative lg:hidden"
      @click="mobileNav = !mobileNav"><i
        class="fa-solid fa-bars fa-sm absolute top-1/2 left-1/2 -translate-x-1/2"></i></button>
  </nav>
  <!-- Mobile NavBar -->
  <nav class="fixed top-0 bottom-0 left-0 right-0 backdrop-blur-sm z-10" :hidden="!mobileNav">
    <div class="flex pt-3 pb-5 px-6 flex-col bg-slate-100 rounded-2xl shadow-lg">
      <div class="flex justify-between items-center">
        <a href="#"><img src="./assets/img/logo-ult-utm.png" class="h-14"
            alt="Logo Unit Layanan Terpadu UTM"></a>
        <button class="ms-auto w-10 h-10 bg-slate-300 rounded-full shadow-lg relative lg:hidden"
          @click="mobileNav = !mobileNav"><i
            class="fa-solid fa-xmark fa-sm absolute top-1/2 left-1/2 -translate-x-1/2"></i></button>
      </div>
      <hr class="border-slate-300 mt-5">
      <ul class="flex flex-col gap-y-4 mt-5">
        @foreach ($items as $item)
          <li>
            <a wire:navigate href="{{ $item['link'] }}"
              class="border-transparent hover:border-b-4 hover:pb-1 hover:border-b-slate-700 transition duration-700">{{ $item['name'] }}</a>
          </li>
        @endforeach
        <li class="list-none">
            @if (Auth::check())
                <a href="{{route('admin.dashboard')}}" class="ms-5 bg-amber-200 py-2 px-3 rounded-lg font-semibold shadow-lg hover:bg-amber-300 hover:scale-105 transition">dashboard</a>
            @else
                <a wire:navigate href="{{route('login')}}"
                    class="ms-5 bg-amber-200 py-2 px-3 rounded-lg font-semibold shadow-lg hover:bg-amber-300 hover:scale-105 transition">Sign-In</a>
            @endif
        </li>
      </ul>
      {{-- <x-layouts.partials.navbar.list-link :$items :$type="mobile" /> --}}
    </div>
  </nav>
</header>
