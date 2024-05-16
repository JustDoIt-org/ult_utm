<x-section.modal maxWidth="sm" :name="$this->modal_name" :title="$this->title" method="save">

    <x-element.layout.vertical name="form.question" label="Question">
        <x-element.input.line wire:model="form.question" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="form.answer" label="Answer">
        <x-element.input.line wire:model="form.answer" />
    </x-element.layout.vertical>

    <x-slot:button>
        <button wire:loading.attr="disabled" type="submit" class="w-full bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-yellow-600 hover:scale-95">Save</button>
    </x-slot:button>
</x-section.modal>
