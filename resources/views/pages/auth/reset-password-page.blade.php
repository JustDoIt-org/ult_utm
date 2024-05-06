<form wire:submit="store">
    @csrf

    <x-element.layout.vertical name="email" label="Email">
        <x-element.input.line wire:model="email" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="password" label="Password">
        <x-element.input.line type="password" wire:model="password" />
    </x-element.layout.vertical>
    <x-element.layout.vertical name="password_confirmation" label="Confirmation Password">
        <x-element.input.line type="password" wire:model="password_confirmation" />
    </x-element.layout.vertical>

    <div class="flex items-center justify-end mt-4">
        <button type="submit" class="w-full rounded-lg bg-yellow-500 text-white hover:scale-95 hover:bg-yellow-600 py-1" >
            {{ __('Reset Password') }}
        </button>
    </div>
</form>
