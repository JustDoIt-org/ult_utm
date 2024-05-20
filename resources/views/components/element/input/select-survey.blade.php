@props(['name', 'item', 'value', 'model'])

<li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
  <div class="flex items-center ps-3">
    <input id="horizontal-list-radio-license" wire:model.live="{{ $model }}" type="radio"
      value="{{ $value }}" name=""
      class="w-4 h-4 text-yellow-600 bg-gray-100 border-gray-300 focus:ring-yellow-500 focus:ring-2">
    <label for="horizontal-list-radio-license"
      class="w-full py-3 ms-2 text-sm font-medium text-gray-900">{{ $item }}</label>
  </div>

</li>
