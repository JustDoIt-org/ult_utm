@props(['items' => ''])



<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">

    <a href="index.html" class="logo d-flex align-items-center me-auto">
      <!-- Uncomment the line below if you also wish to use an image logo -->
      <!-- <img src="assets/img/logo.png" alt=""> -->
      <h1 class="sitename">SILAT INFO</h1>
    </a>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="#hero" class="active">Home</a></li>
        <li><a href="#about">About</a></li>
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
      <a class="btn-getstarted" wire:navigate href="{{ route('login') }}">Login</a>
    @endauth

  </div>
</header>
