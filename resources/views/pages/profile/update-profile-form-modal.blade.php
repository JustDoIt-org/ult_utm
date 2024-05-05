<x-section.modal maxWidth="md" :name="$this->modal_name" :title="$this->title" method="save">
    @foreach ($this->information as $info)
        @switch($info->type)
            @case('text')
                <x-element.layout.vertical name="profile.{{ $info->id }}" :label="$info->name">
                    <x-element.input.line wire:model="profile.{{ $info->id }}" />
                </x-element.layout.vertical>
            @break

            @case('date')
                <x-element.layout.vertical name="profile.{{ $info->id }}" :label="$info->name">
                    <x-element.input.line type="date" wire:model="profile.{{ $info->id }}" />
                </x-element.layout.vertical>
            @break

            @case('phone')
                <x-element.layout.vertical name="profile.{{ $info->id }}" :label="$info->name">
                    <x-element.input.line type="number" wire:model="profile.{{ $info->id }}" />
                </x-element.layout.vertical>
            @break

            @default
        @endswitch
    @endforeach

    <x-slot:button>
        <button wire:loading.attr="disabled" type="submit" class="w-full bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-yellow-600 hover:scale-95">Save</button>
    </x-slot:button>
</x-section.modal>
