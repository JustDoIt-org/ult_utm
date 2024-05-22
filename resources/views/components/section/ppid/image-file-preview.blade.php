@props(['photo' => ''])


@if ($photo)
  <div class="max-w-sm rounded overflow-hidden shadow-lg mt-4">
    <img class="w-full" src="{{ $photo->temporaryUrl() }}" alt="File Uploads">
  </div>
@endif
