<div>
  <div class="mb-4 text-sm text-gray-700 max-w-[800px]">
    {{ __('Silahkan masukkan kode absensi yang dikirim melalui email dan untuk kode kunjungan silahkan tanyakan pada satpam atau petugas') }}
  </div>

  <form wire:submit="submit">
    @csrf
    <!-- Code Absensi -->
    <x-element.layout.vertical name="code" label="kode Absensi">
      <x-element.input.line wire:model="code" />
    </x-element.layout.vertical>

    <!-- Code Kunjungan -->
    <x-element.layout.vertical name="code_kunjungan" label="Kode Kunjungan">
      <x-element.input.line wire:model="code_kunjungan" />
    </x-element.layout.vertical>

    <div class="flex items-center justify-end mt-4">
      <x-element.button.primary>
        {{ __('Submit') }}
      </x-element.button.primary>
    </div>
  </form>
</div>
