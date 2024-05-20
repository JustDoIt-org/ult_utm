{{-- For input text --}}

@props(['field' => '', 'size' => '', 'textSize' => ''])

<div>
  <div class="mt-2 mb-5 mr-5">
    <label for="first_name"
      class="block mb-2 {{ $textSize ? 'text-md' : 'text-sm' }} font-medium text-black">{{ $field }}</label>
    <input type="text" id="first_name"
      class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 {{ $size !== '' ? $size : '' }}"
      required />
  </div>
</div>
