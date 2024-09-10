<x-section.card :$title :$search>
  {{-- @dd(now()->today()) --}}
  <div class="text-center p-2  font-semibold mb-3 text-xl">
    <span class="w-36 border border-secondary p-2 rounded-md shadow-xl"> Kode Kunjungan Hari ini :
      {{ $this->kode_kunjungan->code }}</span>
    <form wire:submit="save">
      <button type="submit"
        class="mr-16 bg-secondary mt-5 text-md rounded-md hover:bg-primary transition-all text-white ml-3 p-2 ">{{ __('Generate Code') }}</button>
    </form>
  </div>
  <x-element.table :$cols :rows="$this->rows" :$sort_direction :$sort_by :$permissions />
  <x-placeholder.offline-states />
  <x-placeholder.loading-states />
</x-section.card>
