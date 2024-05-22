{{-- For input text --}}

@props(['field' => '', 'size' => '', 'textSize' => '', 'model' => ''])

<div>
  <div class="mt-2 mb-5 mr-5">
    <label for="first_name"
      class="block mb-2 {{ $textSize ? 'text-md' : 'text-sm' }} font-medium text-black">{{ $field }}</label>
    <input type="text" wire:model.live="{{ $model }}"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 {{ $size !== '' ? $size : '' }}" />
    @error($model)
      <div class="text-red-600">
        <strong>{{ $message }}</strong>
      </div>
    @enderror
  </div>
</div>
