<section class="h-fit w-screen py-6 px-6 lg:px-20 lg:py-20 bg-slate-100 flex flex-col justify-center items-center gap-5"
  id="FAQs">
  <h2 class="text-2xl text-center font-bold">Pertanyaan yang sering diajukan (FAQs)</h2>
  <div class="accordion-content w-full md:w-3/4" x-data="{ selectedAccordion: 1 }">
    <div class="accordion mb-2 shadow-lg">
      <div class="accordion-header bg-slate-400 px-5 py-4 flex justify-between items-center rounded-t-lg"
        @click="selectedAccordion !== 1 ? selectedAccordion = 1 : selectedAccordion = null"
        x-bind:class="{ 'rounded-b-lg': selectedAccordion !== 1 }">
        <h3 class="accordion-title text-lg font-semibold">Question 1?</h3>
        <i class="fa-solid transition-all duration-500"
          x-bind:class="{ 'fa-plus': selectedAccordion !== 1, 'fa-minus': selectedAccordion === 1 }"></i>
      </div>
      <div class="accordion-item bg-slate-300 relative overflow-hidden max-h-0 rounded-b-lg transition-all duration-500"
        x-ref="accordionItem"
        x-bind:style="selectedAccordion === 1 ? 'max-height: ' + $refs.accordionItem.scrollHeight + 'px' : ''">
        <p class="accordion-answer px-5 py-4 text-justify hidden lg:block">Lorem ipsum dolor sit amet
          consectetur adipisicing elit. At cum vero alias nesciunt quo. Voluptas, non deserunt. Recusandae
          dolore cumque quidem qui, provident, corporis itaque maxime eligendi nihil quisquam odio eveniet
          eaque alias aliquid fuga, reprehenderit accusamus eos perferendis est porro? Accusantium
          praesentium officia quisquam hic minima voluptates, nihil necessitatibus mollitia, facilis
          laudantium cumque ab in quis repellendus delectus odit. Beatae velit sequi vitae, minima
          reprehenderit illum autem facere dicta, mollitia ad deserunt porro ipsum in inventore optio
          cumque sint molestias enim quis? Tempora quia, ex facilis nesciunt quidem doloremque
          reprehenderit nemo culpa, excepturi, nam totam exercitationem voluptatum amet cupiditate?</p>
        <p class="text-justify px-5 py-4 lg:hidden">Unit Layanan Terpadu (ULT) Universitas Trunojoyo Madura
          memberikan manfaat yang signifikan dalam mempermudah kepengurusan layanan mahasiswa dan
          masyarakat dengan mengintegrasikan layanan publik di Kantor Manajemen Universitas Trunojoyo
          Madura. Melalui ULT, proses pemantauan dokumen yang diajukan pemohon menjadi lebih efisien,
          sementara perolehan informasi publik dan proses layanan kepada mahasiswa/masyarakat menjadi
          lebih cepat dan... <small class="text-sky-500">Selengkapnya</small></p>
      </div>
    </div>
    <div class="accordion mb-2 shadow-lg">
      <div class="accordion-header bg-slate-400 px-5 py-4 flex justify-between items-center rounded-t-lg"
        @click="selectedAccordion !== 2 ? selectedAccordion = 2 : selectedAccordion = null"
        x-bind:class="{ 'rounded-b-lg': selectedAccordion !== 2 }">
        <h3 class="accordion-title text-lg font-semibold">Question 2?</h3>
        <i class="fa-solid transition-all duration-500"
          x-bind:class="{ 'fa-plus': selectedAccordion !== 2, 'fa-minus': selectedAccordion === 2 }"></i>
      </div>
      <div class="accordion-item bg-slate-300 relative overflow-hidden max-h-0 rounded-b-lg transition-all duration-500"
        x-ref="accordionItem"
        x-bind:style="selectedAccordion === 2 ? 'max-height: ' + $refs.accordionItem.scrollHeight + 'px' : ''">
        <p class="accordion-answer px-5 py-4 text-justify hidden lg:block">Lorem ipsum dolor sit amet
          consectetur adipisicing elit. At cum vero alias nesciunt quo. Voluptas, non deserunt. Recusandae
          dolore cumque quidem qui, provident, corporis itaque maxime eligendi nihil quisquam odio eveniet
          eaque alias aliquid fuga, reprehenderit accusamus eos perferendis est porro? Accusantium
          praesentium officia quisquam hic minima voluptates, nihil necessitatibus mollitia, facilis
          laudantium cumque ab in quis repellendus delectus odit. Beatae velit sequi vitae, minima
          reprehenderit illum autem facere dicta, mollitia ad deserunt porro ipsum in inventore optio
          cumque sint molestias enim quis? Tempora quia, ex facilis nesciunt quidem doloremque
          reprehenderit nemo culpa, excepturi, nam totam exercitationem voluptatum amet cupiditate?</p>
        <p class="text-justify px-5 py-4 lg:hidden">Unit Layanan Terpadu (ULT) Universitas Trunojoyo Madura
          memberikan manfaat yang signifikan dalam mempermudah kepengurusan layanan mahasiswa dan
          masyarakat dengan mengintegrasikan layanan publik di Kantor Manajemen Universitas Trunojoyo
          Madura. Melalui ULT, proses pemantauan dokumen yang diajukan pemohon menjadi lebih efisien,
          sementara perolehan informasi publik dan proses layanan kepada mahasiswa/masyarakat menjadi
          lebih cepat dan... <small class="text-sky-500">Selengkapnya</small></p>
      </div>
    </div>
    <div class="accordion mb-2 shadow-lg">
      <div class="accordion-header bg-slate-400 px-5 py-4 flex justify-between items-center rounded-t-lg"
        @click="selectedAccordion !== 3 ? selectedAccordion = 3 : selectedAccordion = null"
        x-bind:class="{ 'rounded-b-lg': selectedAccordion !== 3 }">
        <h3 class="accordion-title text-lg font-semibold">Question 3?</h3>
        <i class="fa-solid transition-all duration-500"
          x-bind:class="{ 'fa-plus': selectedAccordion !== 3, 'fa-minus': selectedAccordion === 3 }"></i>
      </div>
      <div class="accordion-item bg-slate-300 relative overflow-hidden max-h-0 rounded-b-lg transition-all duration-500"
        x-ref="accordionItem"
        x-bind:style="selectedAccordion === 3 ? 'max-height: ' + $refs.accordionItem.scrollHeight + 'px' : ''">
        <p class="accordion-answer px-5 py-4 text-justify hidden lg:block">Lorem ipsum dolor sit amet
          consectetur adipisicing elit. At cum vero alias nesciunt quo. Voluptas, non deserunt. Recusandae
          dolore cumque quidem qui, provident, corporis itaque maxime eligendi nihil quisquam odio eveniet
          eaque alias aliquid fuga, reprehenderit accusamus eos perferendis est porro? Accusantium
          praesentium officia quisquam hic minima voluptates, nihil necessitatibus mollitia, facilis
          laudantium cumque ab in quis repellendus delectus odit. Beatae velit sequi vitae, minima
          reprehenderit illum autem facere dicta, mollitia ad deserunt porro ipsum in inventore optio
          cumque sint molestias enim quis? Tempora quia, ex facilis nesciunt quidem doloremque
          reprehenderit nemo culpa, excepturi, nam totam exercitationem voluptatum amet cupiditate?</p>
        <p class="text-justify px-5 py-4 lg:hidden">Unit Layanan Terpadu (ULT) Universitas Trunojoyo Madura
          memberikan manfaat yang signifikan dalam mempermudah kepengurusan layanan mahasiswa dan
          masyarakat dengan mengintegrasikan layanan publik di Kantor Manajemen Universitas Trunojoyo
          Madura. Melalui ULT, proses pemantauan dokumen yang diajukan pemohon menjadi lebih efisien,
          sementara perolehan informasi publik dan proses layanan kepada mahasiswa/masyarakat menjadi
          lebih cepat dan... <small class="text-sky-500">Selengkapnya</small></p>
      </div>
    </div>
    <div class="accordion mb-2 shadow-lg">
      <div class="accordion-header bg-slate-400 px-5 py-4 flex justify-between items-center rounded-t-lg"
        @click="selectedAccordion !== 4 ? selectedAccordion = 4 : selectedAccordion = null"
        x-bind:class="{ 'rounded-b-lg': selectedAccordion !== 4 }">
        <h3 class="accordion-title text-lg font-semibold">Question 4?</h3>
        <i class="fa-solid transition-all duration-500"
          x-bind:class="{ 'fa-plus': selectedAccordion !== 4, 'fa-minus': selectedAccordion === 4 }"></i>
      </div>
      <div class="accordion-item bg-slate-300 relative overflow-hidden max-h-0 rounded-b-lg transition-all duration-500"
        x-ref="accordionItem"
        x-bind:style="selectedAccordion === 4 ? 'max-height: ' + $refs.accordionItem.scrollHeight + 'px' : ''">
        <p class="accordion-answer px-5 py-4 text-justify hidden lg:block">Lorem ipsum dolor sit amet
          consectetur adipisicing elit. At cum vero alias nesciunt quo. Voluptas, non deserunt. Recusandae
          dolore cumque quidem qui, provident, corporis itaque maxime eligendi nihil quisquam odio eveniet
          eaque alias aliquid fuga, reprehenderit accusamus eos perferendis est porro? Accusantium
          praesentium officia quisquam hic minima voluptates, nihil necessitatibus mollitia, facilis
          laudantium cumque ab in quis repellendus delectus odit. Beatae velit sequi vitae, minima
          reprehenderit illum autem facere dicta, mollitia ad deserunt porro ipsum in inventore optio
          cumque sint molestias enim quis? Tempora quia, ex facilis nesciunt quidem doloremque
          reprehenderit nemo culpa, excepturi, nam totam exercitationem voluptatum amet cupiditate?</p>
        <p class="text-justify px-5 py-4 lg:hidden">Unit Layanan Terpadu (ULT) Universitas Trunojoyo Madura
          memberikan manfaat yang signifikan dalam mempermudah kepengurusan layanan mahasiswa dan
          masyarakat dengan mengintegrasikan layanan publik di Kantor Manajemen Universitas Trunojoyo
          Madura. Melalui ULT, proses pemantauan dokumen yang diajukan pemohon menjadi lebih efisien,
          sementara perolehan informasi publik dan proses layanan kepada mahasiswa/masyarakat menjadi
          lebih cepat dan... <small class="text-sky-500">Selengkapnya</small></p>
      </div>
    </div>
  </div>
</section>
