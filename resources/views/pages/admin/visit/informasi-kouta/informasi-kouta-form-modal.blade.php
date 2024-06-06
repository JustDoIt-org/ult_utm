<x-section.modal maxWidth="md" :name="$this->modal_name" :title="$this->title" method="save">

    <x-element.layout.vertical name="form.tanggal_kunjungan" label="Tanggal Kunjungan">
        <x-element.input.line type="date" wire:model="form.tanggal_kunjungan" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.sisa_kouta" label="Sisa Kouta">
        <x-element.input.line type="number" wire:model="form.sisa_kouta" />
    </x-element.layout.vertical>
    <div class="flex flex-col">
        <label for="form.tujuan_kunjungan">Tujuan Kunjungan</label>
        <x-element.select.dropdown wire:model.change="form.tujuan_kunjungan">
                <option>--- Choose Faculty ---</option>
            @foreach ($faculties as $faculty)
                <option value="{{$faculty['name']}}">{{ $faculty["name"] }}</option>
            @endforeach
        </x-element.select.dropdown>
    </div>
    {{-- <x-element.layout.vertical name="form.tujuan_kunjungan" label="Tujuan Kunjungan">
        <x-element.input.line wire:model="form.tujuan_kunjungan" />
    </x-element.layout.vertical> --}}
    <x-element.layout.vertical name="form.warna_tulisan" label="Warna Tulisan">
        <x-element.input.line type="color" wire:model="form.warna_tulisan" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.warna_latar_belakang" label="Warna Latar Belakang">
        <x-element.input.line type="color" wire:model="form.warna_latar_belakang" />
    </x-element.layout.vertical>

    <x-slot:button>
        <button wire:loading.attr="disabled" type="submit" class="w-full bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-yellow-600 hover:scale-95">Save</button>
    </x-slot:button>
</x-section.modal>
