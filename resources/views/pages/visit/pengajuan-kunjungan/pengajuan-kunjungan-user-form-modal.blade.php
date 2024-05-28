@php
    $sisa_kouta = null;
@endphp

<x-section.modal maxWidth="md" :name="$this->modal_name" :title="$this->title" method="save">
    <div class="flex flex-col mb-5">
        <label for="form.tujuan_kegiatan">Tujuan Kegiatan</label>
        <x-element.select.dropdown wire:model.change="form.tujuan_kegiatan">
            <option>---Pilih Tujuan Kegiatan---</option>

            @foreach ($form->generateKunjungan() as $value)
                <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </x-element.select.dropdown>
    </div>
    <div class="flex flex-col">
        <label for="form.tanggal_tersedia">Tanggal Tersedia</label>
        <x-element.select.dropdown wire:model.change="form.tanggal_tersedia">
            <option>---Pilih tanggal yang tersedia---</option>

            @foreach ($form->generateTanggalTersedia()['tanggal_tersedia'] as $key => $value)
                <option value="{{ $value }}">
                    {{ 'Tanggal: '.$value.' | Kouta: '.$form->generateTanggalTersedia()['sisa_kouta'][$key] }}
                </option>
            @endforeach
        </x-element.select.dropdown>
    </div>
    <x-element.layout.vertical name="form.institusi_pengunjung" label="Institusi Pengunjung">
        <x-element.input.line wire:model="form.institusi_pengunjung" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.provinsi_asal" label="Provinsi Asal">
        <x-element.input.line wire:model="form.provinsi_asal" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.kota_asal" label="Kota Asal">
        <x-element.input.line wire:model="form.kota_asal" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.nama_kegiatan" label="Nama Kegiatan">
        <x-element.input.line wire:model="form.nama_kegiatan" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.kapasitas_peserta" label="Kapasitas Peserta">
        <x-element.input.line type="number" wire:model="form.kapasitas_peserta" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.jumlah_bus" label="Jumlah Bus">
        <x-element.input.line type="number" wire:model="form.jumlah_bus" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.nama_pic" label="Nama PIC">
        <x-element.input.line wire:model="form.nama_pic" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.kontak_pic" label="Kontak PIC">
        <x-element.input.line wire:model="form.kontak_pic" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.surat_permohonan" label="Surat Permohonan">
        <x-element.input.line type="file" wire:model="form.surat_permohonan" />
    </x-element.layout.vertical>

    <x-slot:button>
        <button wire:loading.attr="disabled" type="submit" class="w-full bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-yellow-600 hover:scale-95">Save</button>
    </x-slot:button>
</x-section.modal>

