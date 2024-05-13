@props(['label'])

<div class="mt-3 capitalize max-w-72">
  <label class="block mb-2 text-sm font-medium text-gray-900" for="file_input">{{ $label }}</label>
  <input
    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none"
    id="file_input" type="file">
</div>
