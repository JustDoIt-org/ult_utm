@props([
    'kategori',
    'textfield' => false,
    'model' => '',
    'type' => '',
    'input_text_field' => '',
    'placeholder' => '',
    'target' => '',
    'model_input_file' => '',
])


<div class="items-center mb-4">
  <input id="default-radio-1" type="radio" wire:model.live="{{ $model }}" value="{{ $kategori }}"
    class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500 focus:ring-2 ">
  <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900">{{ $kategori }}</label>



  @switch($type)
    @case('input_text')
      @if ($textfield === $kategori)
        <input type="text" class="ml-2 h-3 w-40 rounded-md p-3 focus:ring-yellow-500 focus:border-yellow-500"
          wire:model.live="{{ $input_text_field }}" placeholder="{{ $placeholder }}">
        @error($input_text_field)
          <div class="text-red-600">
            <strong>{{ $message }}</strong>
          </div>
        @enderror
      @endif
    @break

    @case('text_with_upload_file')
      @if ($textfield === $kategori)
        <div class="mt-3">
          <input type="text" class="ml-2 h-3 w-40 rounded-md p-3 focus:ring-yellow-500 focus:border-yellow-500" required
            wire:model.live="{{ $input_text_field }}" placeholder="{{ $placeholder }}">
          @error($input_text_field)
            <div class="text-red-600">
              <strong>{{ $message }}</strong>
            </div>
          @enderror
          <div class="ml-2">
            <x-element.input.input-file label="input file" :model="$model_input_file" :$target />
          </div>
        </div>
      @endif
    @break

    @default
  @endswitch

</div>
