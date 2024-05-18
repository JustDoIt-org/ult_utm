<x-section.modal maxWidth="lg" :name="$this->modal_name" :title="$this->title" method="save">

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

        {{-- Upload Image Carousel --}}
        <x-element.layout.vertical name="form.photo" label="Photo">
            <div x-data="{
                imageUrl: null,
                previewPhoto() {
                    let photo = this.$refs.photoRef.files[0]

                    if(photo || photo.type.indexOf('image/') !== -1){
                        this.imageUrl = null
                        let reader = new FileReader()

                        reader.onload = e => {
                            this.imageUrl = e.target.result
                        }

                        reader.readAsDataURL(photo)
                    }

                }
            }"
            x-on:close-modal.window="(name === $event.detail.name) ? imageUrl = null : $event.preventDefault()"
            class="flex relative justify-center items-center h-[150px] w-[300px] overflow-hidden rounded-lg border border-yellow-600 group/img" @click="$refs.photoRef.click()">

                {{-- Background hover upload image --}}
                <div class="absolute top-0 bottom-0 left-0 right-0 group-hover/img:bg-black/60 transition-all z-20 flex justify-center items-center opacity-0 group-hover/img:opacity-100 text-white font-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.827 6.175A2.31 2.31 0 0 1 5.186 7.23c-.38.054-.757.112-1.134.175C2.999 7.58 2.25 8.507 2.25 9.574V18a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9.574c0-1.067-.75-1.994-1.802-2.169a47.865 47.865 0 0 0-1.134-.175 2.31 2.31 0 0 1-1.64-1.055l-.822-1.316a2.192 2.192 0 0 0-1.736-1.039 48.774 48.774 0 0 0-5.232 0 2.192 2.192 0 0 0-1.736 1.039l-.821 1.316Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 12.75a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0ZM18.75 10.5h.008v.008h-.008V10.5Z" />
                    </svg>
                </div>

                <input x-init="imageUrl = null" x-ref="photoRef" id="form.photo" type="file" accept=".png, .jpg, .jpeg" wire:model="form.photo" class="hidden" @change="previewPhoto"/>

                @if ($form->photo)
                    <template x-if="imageUrl && !uploading">
                        <img :src="imageUrl" class="object-cover max-w-[300px] w-full scale-110 h-[150px] transition-all group-hover/img:scale-100 group-hover/img:w-[70%]">
                    </template>

                    <template x-if="!imageUrl && !uploading">
                        <img src="storage{{ $form->photo }}" class="object-cover max-w-[300px] w-full scale-110 h-[150px] transition-all group-hover/img:scale-100 group-hover/img:w-[70%]">
                    </template>
                @else
                    <img x-show="!uploading" src="https://www.pt-btu.co.id/assets/images/default.png" class="object-cover max-w-[300px] w-full scale-110 h-[150px] space-x-reverse transition-all group-hover/img:scale-100">
                @endif

                {{-- Indicatior progress --}}
                <div x-show="uploading" class="w-full h-full bg-yellow-200/45 flex justify-center items-center">
                    <div class="w-10 h-10 animate-bounce flex items-center justify-center rounded-full border border-yellow-500 bg-yellow-400/40 font-bold text-yellow-800">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                        </svg>
                    </div>
                </div>
            </div>
        </x-element.layout.vertical>


        <button wire:loading.attr="disabled" type="submit" class="w-full mt-5 bg-yellow-500 rounded-lg py-1 text-white font-semibold transition-all hover:bg-yellow-600 hover:scale-95">Save</button>
    </div>
</x-section.modal>
