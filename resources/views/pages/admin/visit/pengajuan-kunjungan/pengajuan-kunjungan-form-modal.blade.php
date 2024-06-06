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

        <span class="text-sm font-semibold text-slate-600 mt-2">
            Tanggal kunjungan: <span class="text-green-500">{{ $form->tanggal_tersedia }}</span>
        </span>
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
    <div class="flex flex-col">
        <label for="form.progress">Progress</label>

        <x-element.select.dropdown wire:model.change="form.progress">
            @foreach ($this->progress as $value)
                <option value="{{$value}}">
                    {{ $value }}
                </option>
            @endforeach
        </x-element.select.dropdown>

        <span class="text-sm font-semibold text-slate-600 mt-2">
            Tanggal kunjungan: <span class="text-green-500">{{ $form->tanggal_tersedia }}</span>
        </span>
    </div>

    <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false"
        x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress" wire:target="save">

        <x-element.layout.vertical name="form.surat_permohonan" label="Surat Permohonan">
            <input x-show="!uploading" type="file" accept=".pdf, .doc, .docx" id="form.surat_permohonan" wire:model="form.surat_permohonan" />
            <div x-show="uploading" class="flex justify-center">
                <img class="animate-spin" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABI0lEQVR4nO2WQW7CMBBF/6q3gF6naXqvpkcq7aqIRdotlWaK2EDTA9AKlh/ZZBGoMQl2LBZ8aRTJUfzm/1gjA1ddoqjIKfimYElBlg4sWFJBW4JFsqboA3vexQBntaMFBXfRwTwjNl9T7cF9xnap4Cw0Nn7ilopXKv4oeOEcw/idusA7KBvJjVKBf/fAipX/gzmGMWKx8bZ1TAMVbGzNMAgCm38sGFnngmevmQZ4HQru3ukMg+TQGOIUN1Q8UfFDRUVFYdb6BxvQ/mk2VXTZYELF+Axw5QBXXTYYU/D2b/0LD1S824m0e+ZRwS7VUDoqPxH1I0JExYcTLCgPDldRO49zuKhYHXHsH4ehauO4F9HcTNyO73sFN65FZT2DyyTQqxCgLYb+uaojF71KAAAAAElFTkSuQmCC">
            </div>
        </x-element.layout.vertical>

        <section>
            <button x-show="!uploading" wire:target="save" wire:loading.attr="disabled" wire:loading.class="opacity-50" type="submit" class="w-full bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-yellow-600 hover:scale-95">
                <span wire:loading.remove wire:target="save">Save</span>
                <span wire:loading wire:target="save">Loading ...</span>
            </button>
            <div x-show="uploading" class="flex justify-center w-full bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all">
                <span>Uploading ...</span>
            </div>
        </section>
    </div>
</x-section.modal>

