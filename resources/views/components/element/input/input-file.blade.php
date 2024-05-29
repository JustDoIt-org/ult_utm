@props(['label', 'model' => '', 'target' => ''])
<div class="mt-3 capitalize max-w-72" x-data="{ uploading: false, progress: 0 }"
x-on:livewire-upload-start="uploading = true"
  x-on:livewire-upload-finish="uploading = false; progress = 0;"
  x-on:livewire-upload-progress="progress = $event.detail.progress">
  <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">{{ $label }}</label>
  <div>
    <label
      class="cursor-pointer max-w-36 text-center flex items-center gap-5 bg-yellow-500 p-2 rounded-lg hover:bg-yellow-700 text-white font-bold"
      for="{{ $model }}" wire:loading.class.remove="hover:bg-yellow-700 cursor-pointer" wire:target="{{ $model }}"
      wire:loading.class="opacity-50">
      <span class=" flex gap-3" wire:loading.remove wire:target="{{ $model }}">
        Upload
        file
        <x-heroicon-o-arrow-up-tray class="w-5 h-5" />
      </span>
      {{-- progress bar --}}
      <div x-show="uploading">
        <span>Uploading</span>
      </div>
    </label>
    <input
      class=" w-full text-sm text-gray-900 border hidden border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
      id="{{ $model }}" type="file" wire:model.live="{{ $model }}" accept="image/png, image/jpeg">
  </div>


  @error($model)
    <div class="text-red-600">
      <strong>{{ $message }}</strong>
    </div>
  @enderror
</div>
