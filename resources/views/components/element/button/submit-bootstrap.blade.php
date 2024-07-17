@props(['target', 'buttonName', 'position' => '', 'icon' => ''])

<div class="d-flex {{ $position === 'middle' ? 'justify-content-center' : '' }}">
  <button type="submit" class=" text-white btn bg-gradient-primary" wire:loading.attr="disabled"
    wire:loading.class="opacity-50" wire:target="{{ $target }}">
    <p wire:loading wire:target="{{ $target }}">Loading</p>
    <span class="" wire:loading.remove wire:target="{{ $target }}">
      {{ $buttonName }}
    </span>
  </button>
</div>
