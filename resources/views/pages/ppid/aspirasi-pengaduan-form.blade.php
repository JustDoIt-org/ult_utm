<div>
  @if ($profile)
    <form wire:submit='save'>
      <div class="ml-3 mt-3 flex gap-8">
        <label for="first_name" class="block mb-2 text-sm font-medium text-black">Jenis Layanan</label>
        <div>
          @foreach ($kategori_pemohon as $kategori)
            <x-element.input.input-radio :$kategori name="jenis_layanan" model="aspengaduan_button" />
          @endforeach
        </div>
      </div>

      @foreach ($fields as $field)
        <x-element.input.input-text-field :field="$field[0]" :model="$field[1]" />
      @endforeach

      @foreach ($text_area as $field)
        <x-element.input.text-area :field="$field[0]" :model="$field[1]" />
      @endforeach

      <x-element.input.input-file label="input file" model="photo" target="save" />

      <x-section.ppid.image-file-preview :$photo />

      <x-element.button.submit-ppid target="save, photo" buttonName="Kirim Permohonan" position="middle" />
    </form>
  @else
    <div class="text-center text-4xl mt-3">Mohon Lengkapi No Telepon Di Profile Menu</div>
  @endif

</div>
