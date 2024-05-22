@props(['target', 'buttonName', 'position' => '', 'icon' => ''])

<div class="flex {{ $position === 'middle' ? 'my-4 mx-auto justify-center' : '' }}">
  <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50" wire:target="{{ $target }}"
    class="bg-yellow-500 flex gap-2 items-center justify-center hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
    <p wire:loading wire:target="{{ $target }}">Loading</p>
    @switch($icon)
      @case('magnifying-glass')
        <x-heroicon-o-magnifying-glass class="w-4 h-4" />
      @break

      @default
    @endswitch
    <p class="align-middle" wire:loading.remove wire:target="{{ $target }}">
      {{ $buttonName }}
    </p>
  </button>
</div>
