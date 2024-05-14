@props(['about' => '', 'carousel' => []])

<section class="h-screen w-screen py-6 px-6 lg:px-20 bg-slate-200 flex flex-col lg:flex-row items-center gap-5"
  id="tentang-ult-section">
  <div class="w-full lg:w-1/2 h-[636px] flex gap-5 order-last lg:order-first" id="galery">
    <div class="w-1/2 flex flex-col gap-5">
        <div class="h-1/2 w-full bg-cover bg-center bg-no-repeat rounded-xl shadow-xl"
            style="background-image: url({{ asset('storage/'.$carousel[0]->photo) }})"></div>
        <div class="h-1/2 w-full bg-cover bg-center bg-no-repeat rounded-xl shadow-xl"
            style="background-image: url({{ asset('storage/'.$carousel[2]->photo) }})"></div>
    </div>
    <div class="w-1/2 bg-cover bg-center bg-no-repeat rounded-xl shadow-xl"
    style="background-image: url({{ asset('storage/'.$carousel[1]->photo) }})"></div>
  </div>
  <div class="w-full lg:w-1/2 justify-self-end" id="tentang-ult">
    <h2 class="text-2xl text-center lg:text-left font-bold">{{ $about->title }}</h2>
    <p class="hidden text-justify lg:block">{{ $about->desc }}</p>
    <p class="text-justify lg:hidden">Unit Layanan Terpadu (ULT) Universitas Trunojoyo Madura memberikan manfaat
      yang signifikan dalam mempermudah kepengurusan layanan mahasiswa dan masyarakat dengan mengintegrasikan
      layanan publik di Kantor Manajemen Universitas Trunojoyo Madura. Melalui ULT, proses pemantauan dokumen
      yang diajukan pemohon menjadi lebih efisien, sementara perolehan informasi publik dan proses layanan
      kepada mahasiswa/masyarakat menjadi lebih cepat dan... <small class="text-sky-500">Selengkapnya</small>
    </p>
  </div>
</section>
