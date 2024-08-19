<section class="mr-10 my-14">
    <form wire:submit="save" class="w-full rounded-xl bg-white">
        <h1>Form Pengajuan Kunjungan Langsung</h1>

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

            <span class="text-sm font-semibold text-slate-600 mt-2">
                Tanggal kunjungan: <span class="text-green-500">{{ $form->tanggal_tersedia }}</span>
            </span>
        </div>
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
            <x-element.input.line type="number" wire:model="form.kontak_pic" />
        </x-element.layout.vertical>

        <div wire:target="save" class="flex flex-col gap-2">
            <section>
                <button wire:target="save" wire:loading.attr="disabled" wire:loading.class="opacity-50" type="submit" class="w-full bg-secondary rounded-lg py-1 text-white font-semibold transition-all hover:scale-95">
                    <span wire:loading.remove wire:target="save">Save</span>
                    <span wire:loading wire:target="save">Loading ...</span>
                </button>
            </section>
        </div>
    </form>
</section>
