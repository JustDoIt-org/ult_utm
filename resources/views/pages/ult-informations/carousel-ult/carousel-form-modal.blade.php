<x-section.modal maxWidth="md" :name="$this->modal_name" :title="$this->title" method="save">

    <div x-data="{ uploading: false, progress: 0 }"
        x-on:livewire-upload-start="uploading = true"
        x-on:livewire-upload-finish="uploading = false"
        x-on:livewire-upload-cancel="uploading = false"
        x-on:livewire-upload-error="uploading = false"
        x-on:livewire-upload-progress="progress = $event.detail.progress" >

        <x-element.layout.vertical name="form.nameButton" label="Name Button">
            <x-element.input.line wire:model="form.nameButton" />
        </x-element.layout.vertical>
        <x-element.layout.vertical name="form.linkButton" label="Link">
            <x-element.input.line wire:model="form.linkButton" />
        </x-element.layout.vertical>
        <x-element.layout.vertical name="form.photo" label="Photo">
            <input id="form.photo" type="file" accept=".png, .jpg, .jpeg" wire:model="form.photo" />
        </x-element.layout.vertical>

        {{-- Indicatior progress --}}
        <div x-transition x-show="uploading" class="bg-white rounded-xl border border-yellow-600 shadow-sm overflow-hidden">
            <div class="relative h-2 flex items-center justify-center">
                <div x-bind:class="`scale-x-[${progress}%] w-[${progress}%] absolute top-0 bottom-0 left-0 rounded-lg bg-yellow-200 transition-all`"></div>
                {{-- <div x-text="`${progress}%`" class="relative text-indigo-900 font-medium text-sm"></div> --}}
            </div>
        </div>

        <button wire:loading.attr="disabled" type="submit" class="w-full mt-5 bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-yellow-600 hover:scale-95">Save</button>
    </div>
</x-section.modal>
