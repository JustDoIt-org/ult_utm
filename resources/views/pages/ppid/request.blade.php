@extends('components.layouts.multiple')

@section('content')
  <x-section.ppid.container :$title :$subTitle>
    @php
      $fields = ['Nama Lengkap', 'Alamat', 'Pekerjaan', 'Nomor Telepon', 'Email'];
    @endphp
    <form>
      @foreach ($fields as $field)
        <div class="mx-2 mt-2 mb-5">
          <label for="first_name" class="block mb-2 text-sm font-medium text-black">{{ $field }}</label>
          <input type="text" id="first_name"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"
            required />
        </div>
      @endforeach
      <div class="ml-3 mt-3" x-data="{ test: '' }">
        <label for="first_name" class="block mb-2 text-sm font-medium text-black">Kategori Pemohon</label>
        <div>
          @php
            $kategori_pemohon = ['Perorangan', 'Pemerintah', 'Instansi Swasta', 'Organisasi Lainnya'];
          @endphp
          @foreach ($kategori_pemohon as $kategori)
            <div class="flex items-center mb-4">
              <input id="default-radio-1" type="radio" value="{{ $kategori }}" x-model="test"
                class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500 focus:ring-2 ">
              <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900">{{ $kategori }}</label>
              <input type="text" class="ml-2 h-3 w-40" placeholder="halooo" x-show="test=='{{ $kategori }}'">
            </div>
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
      <div class=" flex mb-4">
        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mx-auto">
          Kirim Permohonan
        </button>
      </div>
    </form>
  </x-section.ppid.container>
@endsection
