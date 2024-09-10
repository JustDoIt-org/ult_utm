@props(['items' => ''])



<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="" class=" d-flex align-items-center me-auto flex-column">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <img src="assets/img/logo-silat-info.png" alt="" width="200px" height="100px">
      {{-- <h1 class="sitename">SILAT INFO</h1>
      <small class="text-white" style="margin-left: 30px;">{{ __('Sistem Layanan Terpadu dan Informasi') }}</small> --}}
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">{{ __('Home') }}</a></li>
        <li><a href="#about">{{ __('About') }}</a></li>
        <li><a href="#faq-2">{{ __('Faq') }}</a></li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>
    @auth
      <div class="bg-transparent align-middle">


        <div class="ml-10 whitespace-nowrap">
          {{-- Avatar Dropdown --}}
          {{-- <x-section.avatar-dropdown /> --}}
        </div>
      </div>
    @else
      <a class="btn-getstarted" wire:navigate href="{{ route('login') }}">{{ __('Login') }}</a>
    @endauth

  </div>
</header>
