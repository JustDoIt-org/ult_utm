@extends('components.layouts.multiple')

@section('content')
  <x-section.ppid.container :$title>
    <x-element.input.input-text-field field='Email*' />

    @php
      $data = ['Kemudahan Pelayanan*', 'Kecepatan Pelayanan*', 'Akurasi Pelayanan*', 'Biaya Pelayanan*'];
    @endphp
    @foreach ($data as $name)
      <x-section.ppid.survey-kepuasan :$name />
    @endforeach

    <div class="flex">
      <button
        class="bg-yellow-500 flex gap-2 items-center justify-center hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
        <p class="align-middle">Kirim</p>
      </button>
    </div>
  </x-section.ppid.container>
@endsection
