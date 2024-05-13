@props(['name'])

<div class="mb-4">
  <h3 class="mb-2 text-sm font-semibold text-gray-900 ml-1">{{ $name }}</h3>
  <ul
    class="items-center max-w-[500px] text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
    @php
      $data = ['😔 Tidak Puas', '🫥 Cukup Puas', '😊 Sangat Puas'];

    @endphp
    @foreach ($data as $item)
      <x-element.input.select-survey :$item :$name />
    @endforeach
  </ul>
</div>
