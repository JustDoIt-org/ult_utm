@props(['items'])

<header class="sticky top-0 py-3 px-6 w-screen bg-slate-100/80 rounded-b-2xl backdrop-blur-sm z-10 lg:px-20"
  x-data="{ mobileNav: false }">
  <nav class="flex items-center">
    <a href="#"><img src="./assets/img/logo-ult-utm.png" class="h-14" alt="Logo Unit Layanan Terpadu UTM"></a>
    <div class="ms-auto hidden lg:flex items-center">
      <x-layouts.partials.navbar.list-link :$items />
      <a href="#"
        class="ms-5 bg-amber-200 py-2 px-3 rounded-lg font-semibold shadow-lg hover:bg-amber-300 hover:scale-105 transition">Sign-In</a>
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
      <x-layouts.partials.navbar.list-link :$items ::type="mobile" />
    </div>
  </nav>
</header>