<x-section.modal maxWidth="md" :name="$this->modal_name" :title="$this->title" method="save">

    <x-element.layout.vertical name="current_password1" label="Password">
        <x-element.input.line type="password" wire:model="current_password_modal" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="new_password" label="New Password">
        <x-element.input.line type="password" wire:model="new_password" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="new_password_confirmation" label="New Password Confirmation">
        <x-element.input.line type="password" wire:model="new_password_confirmation" />
    </x-element.layout.vertical>

    <x-slot:button>
        <button type="submit" class="w-full bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-yellow-600 hover:scale-95">Save</button>
    </x-slot:button>
</x-section.modal>
