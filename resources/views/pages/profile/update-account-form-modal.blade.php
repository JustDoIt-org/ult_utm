<x-section.modal maxWidth="md" :name="$this->modal_name" :title="$this->title" method="save">

    <x-element.layout.vertical name="form.name" label="Name">
        <x-element.input.line wire:model="form.name" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.email" label="Email">
        <x-element.input.line wire:model="form.email" />
    </x-element.layout.vertical>

    <x-slot:button>
        <button type="submit" class="w-full bg-secondary rounded-lg py-1 text-white font-semibold transition-all hover:scale-95">Save</button>
    </x-slot:button>
</x-section.modal>
