<x-section.card :$title :$search>
  {{-- @dd(now()->today()) --}}
  <h1 class="text-center p-2  font-semibold mb-3 text-xl">
    <span class="w-36 border border-black p-2 rounded-md"> Kode Kunjungan Hari ini :
      {{ $this->kode_kunjungan[0]->code }}</span>
  </h1>
  <x-element.table :$cols :rows="$this->rows" :$sort_direction :$sort_by :$permissions />
  <x-placeholder.offline-states />
  <x-placeholder.loading-states />
</x-section.card>
