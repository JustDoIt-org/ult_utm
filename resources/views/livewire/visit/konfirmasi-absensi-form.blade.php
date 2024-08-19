<div>
  <div class="mb-4 text-sm text-gray-700 max-w-[800px]">
    {{ __('Silahkan masukkan kode absensi yang dikirim melalui email') }}
  </div>

  <form wire:submit="submit">
    @csrf
    <!-- Code Absensi -->
    <x-element.layout.vertical name="code" label="Code Absensi">
      <x-element.input.line wire:model="code" />
    </x-element.layout.vertical>

    <div class="flex items-center justify-end mt-4">
      <x-element.button.primary>
        {{ __('Submit') }}
      </x-element.button.primary>
    </div>
  </form>
</div>
