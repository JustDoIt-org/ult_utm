{{-- For input text --}}

@props(['field' => ''])

<div class="my-2">

  <label for="message" class="block mb-2 text-sm font-medium text-gray-900">{{ $field }}:</label>
  <textarea id="message" rows="4"
    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-yellow-500 focus:border-yellow-500"></textarea>

</div>
