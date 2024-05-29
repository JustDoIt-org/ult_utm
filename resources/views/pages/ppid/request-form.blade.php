<form wire:submit="store">
  @foreach ($fields as $field)
    <x-element.input.input-text-field :field="$field[0]" :model="$field[1]" />
  @endforeach

  {{-- Kategori Pemohon --}}
  <x-section.ppid.select-group label="Kategori Pemohon" :data="$pemohon" model="base.kategori_pemohon" :textfield="$base->kategori_pemohon"
    input_text_field="base.kategori_pemohon_textfield" />

  {{-- Rincian Informasi --}}
  <x-section.ppid.select-group label="Rincian Informasi" :data="$rincian" model="base.rincian_informasi"
    :textfield="$base->rincian_informasi" input_text_field="base.rincian_informasi_textfield" placeholder="No Ktp" target="store"
    model_input_file="base.ktp" />

  {{-- Preview Foto --}}
  <x-section.ppid.image-file-preview :photo="$base->ktp" />


  @foreach ($text_area as $field)
    <x-element.input.text-area :field="$field[0]" :model="$field[1]" />
  @endforeach

  {{-- Cara memperoleh Informasi --}}
  <x-section.ppid.select-group label="Cara Memperoleh Informasi" :data="$cara_informasi" model="base.get_informasi"
    :textfield="$base->get_informasi" />

  @if ($base->get_informasi === 'Mendapatkan salinan (hardcopy/softcopy)')
    {{-- Cara mendapatkan salinan  --}}
    <x-section.ppid.select-group label="Cara Mendapatkan Salinan" :data="$salinan" model="base.cara_salinan"
      :textfield="$base->cara_salinan" input_text_field="base.cara_salinan_textfield" />
  @endif


  <x-element.button.submit-ppid target="store, base.ktp" buttonName="Kirim Permohonan" position="middle" />

</form>
