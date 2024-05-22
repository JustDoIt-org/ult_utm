<form wire:submit="store">
  @foreach ($fields as $field)
    <x-element.input.input-text-field :field="$field[0]" :model="$field[1]" />
  @endforeach
  <div class="ml-3 mt-3">
    <label for="first_name" class="block mb-2 text-sm font-medium text-black">Kategori Pemohon</label>
    <div>
      @foreach ($pemohon as $kategori)
        @if ($loop->first)
          <x-element.input.input-radio :$kategori name="jenis_layanan" model="kategori_pemohon" />
        @else
          <x-element.input.input-radio :$kategori name="jenis_layanan" model="kategori_pemohon" :text_field="$kategori_pemohon" />
        @endif
      @endforeach
    </div>
  </div>
  <div class="ml-3 mt-3">
    <label for="first_name" class="block mb-2 text-sm font-medium text-black">Rincian Informasi</label>
    <div>
      @php
        $kategori_pemohon = ['Penerimaan Mahasiswa Baru', 'Informasi Umum', 'Permintaan Data'];
      @endphp
      @foreach ($kategori_pemohon as $kategori)
        <div class="flex items-center mb-4">
          <input id="default-radio-1" type="radio" value="" name="default-radio"
            class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500 focus:ring-2 ">
          <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900">{{ $kategori }}</label>
        </div>
      @endforeach
    </div>
  </div>
  <div class="flex mb-4">
    <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mx-auto">
      Kirim Permohonan
    </button>
  </div>
</form>
