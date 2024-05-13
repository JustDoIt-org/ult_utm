@props(['kategori', 'name'])


<div class="flex items-center mb-4">
  <input id="default-radio-1" type="radio" name="{{ $name }}" value="{{ $kategori }}" x-model="test"
    class="w-4 h-4 text-yellow-500 bg-gray-100 border-gray-300 focus:ring-yellow-500 focus:ring-2 ">
  <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900">{{ $kategori }}</label>
  <input type="text" class="ml-2 h-3 w-40" placeholder="halooo" x-show="test=='{{ $kategori }}'">
</div>
