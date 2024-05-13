@extends('components.layouts.multiple')

@section('content')
  <x-section.ppid.container :$title>
    <form>
      <div class="ml-3 mt-3 flex gap-8">
        <label for="first_name" class="block mb-2 text-sm font-medium text-black">Jenis Layanan</label>
        @php
          $name = 'jenis_layanan';
          $kategori_pemohon = ['Aspirasi', 'Pengaduan'];
        @endphp
        <div>
          @foreach ($kategori_pemohon as $kategori)
            <x-element.input.input-radio :$kategori :$name />
          @endforeach
        </div>
      </div>
      @php
        $fields = ['Nama Lengkap', 'NIK', 'Email', 'No. Handphone', 'Judul Aspirasi/Pengaduan'];
      @endphp
      @foreach ($fields as $field)
        <x-element.input.input-text-field :$field />
      @endforeach
      @php
        $name = 'area';
        $kategori_pemohon = ['Judul Aspirasi/Pengaduan', 'Saran'];
      @endphp
      @foreach ($kategori_pemohon as $field)
        <x-element.input.text-area :$field />
      @endforeach
      @php
        $label = 'input file';
      @endphp

      <x-element.input.input-file :$label />

      <div class=" flex my-4 ">
        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded mx-auto">
          Kirim Permohonan
        </button>
      </div>
    </form>
  </x-section.ppid.container>
@endsection
