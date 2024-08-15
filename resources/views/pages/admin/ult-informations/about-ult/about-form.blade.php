<x-section.card title="About">

    <form wire:submit="save">
        <x-element.layout.vertical name="title" label="Title">
            <x-element.input.line wire:model="title" />
        </x-element.layout.vertical>

        <div class="flex flex-col gap-1 mb-10">
            <label for="desc" class="text-slate-600">Description</label>
            <textarea id="desc" name="desc" rows="4" cols="50" wire:model="desc" class="border-gray-300 focus:border-secondary focus:ring-secondary rounded-md shadow-sm"></textarea>
        </div>

        @can('ult-informations edit')
            <button wire:loading.attr="disabled" type="submit" class="w-full bg-secondary rounded-lg py-1 text-white font-semibold transition-all hover:bg-secondary hover:scale-95">Save</button>
        @endcan
    </form>

    <x-placeholder.loading-states />
</x-section.card>

