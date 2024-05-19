@props(['name', 'model'])

<div class="my-4">
  <h3 class="mb-2 text-sm font-semibold text-gray-900 ml-1">{{ $name }}*</h3>
  <ul
    class="items-center max-w-[500px] text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg sm:flex">
    @php
      $data = [['tidak_puas', '😔 Tidak Puas'], ['cukup_puas', '🫥 Cukup Puas'], ['sangat_puas', '😊 Sangat Puas']];
    @endphp
    @foreach ($data as $item)
      <x-element.input.select-survey :item="$item[1]" :value="$item[0]" :$model :$name />
    @endforeach
  </ul>
  @error($model)
    <div class="text-red-600">
      <strong>Kolom ini harus diisi</strong>
    </div>
  @enderror
</div>
