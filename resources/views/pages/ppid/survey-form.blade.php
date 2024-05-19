<div>
  <form wire:submit='store'>
    @foreach ($hasil as $name)
      <x-section.ppid.survey-kepuasan :name="$name->name" :model="$arr[$loop->index]" />
    @endforeach

    <div class="flex">
      <button type="submit" wire:loading.class="opacity-50"
        class="bg-yellow-500 flex gap-2 items-center justify-center hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
        <p class="align-middle">Kirim</p>
      </button>
    </div>
  </form>
</div>
