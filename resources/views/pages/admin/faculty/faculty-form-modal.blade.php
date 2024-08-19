<x-section.modal maxWidth="lg" :name="$this->modal_name" :title="$this->title" method="save">

    <x-element.layout.vertical name="form.name" label="Name">
        <x-element.input.line wire:model="form.name" />
    </x-element.layout.vertical>

    <x-element.layout.vertical name="form.code" label="Code">
        <x-element.input.line wire:model="form.code" />
    </x-element.layout.vertical>

    <x-slot:button>
        <button wire:loading.attr="disabled" type="submit" class="w-full bg-secondary rounded-lg py-1 text-white font-semibold transition-all hover:scale-95">Save</button>
    </x-slot:button>
</x-section.modal>
