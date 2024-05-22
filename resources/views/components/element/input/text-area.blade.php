{{-- For input text --}}

@props(['field' => '', 'model' => ''])

<div class="my-2 mr-5">

  <label for="message" class="block mb-2 text-sm font-medium text-gray-900">{{ $field }}:</label>
  <textarea id="message" rows="4" wire:model.live="{{ $model }}"
    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-yellow-500 focus:border-yellow-500"></textarea>
  @error($model)
    <div class="text-red-600">
      <strong>{{ $message }}</strong>
    </div>
  @enderror
</div>
