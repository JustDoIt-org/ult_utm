<x-section.modal maxWidth="md" :name="$this->modal_name" :title="$this->title" method="save">

    <x-element.layout.vertical name="form.nameButton" label="Name Button">
        <x-element.input.line wire:model="form.nameButton" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.linkButton" label="Link">
        <x-element.input.line wire:model="form.linkButton" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.photo" label="Photo">
        <x-element.input.line type="file" wire:model="form.photo" />
    </x-element.layout.vertical>

    <x-slot:button>
        <button wire:loading.attr="disabled" type="submit" class="w-full bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-yellow-600 hover:scale-95">Save</button>
    </x-slot:button>
</x-section.modal>
