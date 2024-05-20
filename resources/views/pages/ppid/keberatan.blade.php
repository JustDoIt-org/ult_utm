<div class="flex">
  <div class="ml-3 mr-1 my-2">
    <p class="text-xs text-gray-500">{{ $desc }}</p>
    <form action="">
      <x-element.input.input-text-field field="No Permohonan" size="max-w-[500px]" textSize="md" />
      <div class="flex">
        <button
          class="bg-yellow-500 flex gap-2 items-center justify-center hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
          <x-heroicon-o-magnifying-glass class="w-4 h-4" />
          <p class="align-middle">Lacak Permohonan</p>
        </button>
      </div>
    </form>
  </div>
</div>
