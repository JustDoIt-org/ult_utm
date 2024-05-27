<x-section.modal maxWidth="md" :name="$this->modal_name" :title="$this->title" method="save">

    <x-element.layout.vertical name="form.tujuan_kegiatan" label="Tujuan Kegiatan">
        <x-element.input.line wire:model="form.tujuan_kegiatan" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.tanggal_tersedia" label="Tanggal Tersedia">
        <x-element.input.line type="date" wire:model="form.tanggal_tersedia" />
    </x-element.layout.vertical>
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
        <x-element.input.line wire:model="form.kapasitas_peserta" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.jumlah_bus" label="Jumlah Bus">
        <x-element.input.line wire:model="form.jumlah_bus" />
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
