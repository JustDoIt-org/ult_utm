@props(['kategori', 'name', 'text_field' => false, 'model' => ''])


<div class="flex items-center mb-4">
  <input id="default-radio-1" type="radio" wire:model.live="{{ $model }}" value="{{ $kategori }}"
    class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500 focus:ring-2 ">
  <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900">{{ $kategori }}</label>
  @if ($text_field === $kategori)
    <input type="text" class="ml-2 h-3 w-40 rounded-md p-3 focus:ring-yellow-500 focus:border-yellow-500" required
      wire:model.live="kategori_pemohon_field">
  @endif

  @error($model)
    <div class="text-red-600">
      <strong>{{ $message }}</strong>
    </div>
  @enderror
</div>
