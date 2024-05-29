<x-section.modal maxWidth="sm" :name="$this->modal_name" :title="$this->title" method="save">

    <x-element.layout.vertical name="form.question" label="Question">
        <x-element.input.line wire:model="form.question" />
    </x-element.layout.vertical>

    <div class="flex flex-col gap-1 mb-10">
        <label for="form.answer" class="text-slate-600">Answer</label>
        <textarea id="form.answer" name="form.answer" rows="4" cols="50" wire:model="form.answer" class="border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm"></textarea>
    </div>

    <x-slot:button>
        <button wire:loading.attr="disabled" type="submit" class="w-full bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-yellow-600 hover:scale-95">Save</button>
    </x-slot:button>
</x-section.modal>
