<x-section.modal maxWidth="sm" :name="$this->modal_name" :title="$this->title" method="save">

    <x-element.layout.vertical name="form.name" label="Name">
        <x-element.input.line wire:model="form.name" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.email" label="Email">
        <x-element.input.line wire:model="form.email" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.password" label="Password">
        <x-element.input.line type="password" wire:model="form.password" />
    </x-element.layout.vertical>

    <x-slot:button>
        <button wire:loading.attr="disabled" type="submit" class="w-full bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-yellow-600 hover:scale-95">Save</button>
    </x-slot:button>
</x-section.modal>
