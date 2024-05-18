<section>
    <section class="flex justify-center items-center gap-5 w-full flex-nowrap overflow-x-auto">
        @if (count($photos) != 0)
            @foreach ($photos as $item)
                <div class="flex flex-col gap-3 justify-between items-center">
                    <div class="h-[100px] w-[150px] bg-yellow-500">
                        <img src="{{ asset("storage") }}/{{ $item->photo }}" alt="{{ $item->nameButton }}" class="h-full w-full object-cover">
                    </div>
                    <button wire:click="delete({{ $item->id }})" wire:loading.attr="disabled" class="w-full bg-red-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-red-600 hover:scale-95">Delete</button>
                </div>
            @endforeach
        @endif
    </section>

    <form wire:submit="save">
        <x-element.layout.vertical name="nameButton" label="Name Button">
            <x-element.input.line wire:model="nameButton" wire:model="nameButton" />
        </x-element.layout.vertical>
        <x-element.layout.vertical name="linkButton" label="Link">
            <x-element.input.line wire:model="linkButton" wire:model="linkButton" />
        </x-element.layout.vertical>
        <x-element.layout.vertical name="photo" label="Photo">
            <x-element.input.line type="file" wire:model="photo" />
        </x-element.layout.vertical>

        <button wire:loading.attr="disabled" type="submit" class="w-full bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-yellow-600 hover:scale-95">Upload</button>
    </form>
</section>
