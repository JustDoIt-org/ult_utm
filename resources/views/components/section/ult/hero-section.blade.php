<section class="h-screen w-screen relative -mt-[80px]" id="slider-images" x-data="{
    activeSlide: 3,
    contentSlides: [{
            id: 1,
            image: 'bg-[url(assets/img/hero-image-1.jpg)]',
            btnText: 'Layanan Kunjungan Sekolah'
        },
        {
            id: 2,
            image: 'bg-[url(assets/img/hero-image-2.jpg)]',
            btnText: 'Layanan Aspirasi & Pengaduan'
        },
        {
            id: 3,
            image: 'bg-[url(assets/img/hero-image-3.jpg)]',
            btnText: 'Layanan Kemahasiswaan'
        },
        {
            id: 4,
            image: 'bg-[url(assets/img/hero-image-4.jpg)]',
            btnText: 'Layanan Masyarakat'
        },
        {
            id: 5,
            image: 'bg-[url(assets/img/hero-image-5.jpg)]',
            btnText: 'Layanan Kunjungan Tamu'
        }
    ],
    loop() {
        setInterval(() => {
            this.activeSlide = this.activeSlide === this.contentSlides.length ? 1 : this.activeSlide + 1
        }, 4000);
    }
}" x-init="loop">
  <template x-for="slide in contentSlides" :key="slide.id">
    <div x-show="activeSlide === slide.id" x-bind:class="slide.image"
      class="h-full w-full bg-cover bg-center bg-no-repeat relative">
      <div class="w-full h-full bg-gradient-to-b from-slate-50/0 from-55% to-slate-50/55 absolute top-0 left-0">
      </div>
      <a href="#"
        class="min-w-72 px-10 py-3 bg-amber-300 rounded-lg shadow-lg font-medium text-lg text-center text-slate-800 absolute bottom-24 left-1/2 -translate-x-1/2 hover:bg-amber-400 hover:scale-105 transition duration-300"
        x-text="slide.btnText"></a>
    </div>
  </template>
  <div class="flex w-full px-6 justify-between absolute top-1/2 left-0 lg:px-20">
    <button x-on:click="activeSlide = activeSlide === 1 ? 5 : activeSlide - 1"
      class="p-3 w-14 h-14 bg-slate-300/60 rounded-full shadow-lg backdrop-blur-sm relative hover:scale-125 transition duration-500"><i
        class="fa-solid fa-angle-left fa-2xl absolute top-1/2 left-1/2 -translate-x-1/2"></i></button>
    <button x-on:click="activeSlide = activeSlide === contentSlides.length ? 1 : activeSlide + 1"
      class="p-3 w-14 h-14 bg-slate-300/60 rounded-full shadow-lg backdrop-blur-sm relative hover:scale-125 transition duration-500"><i
        class="fa-solid fa-angle-right fa-2xl absolute top-1/2 left-1/2 -translate-x-1/2"></i></button>
  </div>
  <div class="w-fit p-1 bg-slate-200 flex gap-1 absolute bottom-3 left-1/2 -translate-x-1/2 rounded-full" x-transition>
    <template x-for="slide in contentSlides" :key="slide.id">
      <button class="inline-block w-3 h-3 hover:bg-slate-600 rounded-full"
        x-bind:class="{ 'bg-sky-400': activeSlide === slide.id, 'bg-slate-300': activeSlide !== slide.id }"
        x-on:click="activeSlide = slide.id"></button>
    </template>
  </div>
</section>
