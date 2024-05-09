<section x-data="{ emailNotif: false }" class="py-12 px-8 md:px-0">

    <div class="mx-auto space-y-6 max-w-7xl w-[400px] sm:w-[80%] md:w-[90%] lg:w-[80%]">

        {{-- Account Information --}}
        <div class="flex flex-col md:flex-row bg-white shadow rounded-lg">
            <div class="w-full md:w-1/2 lg:w-2/4">
                <div class="flex justify-center items-center md:h-full font-bold text-white text-8xl rounded-t-lg md:rounded-s-lg uppercase">
                    <img src="{{ Auth::user()->picture }}" alt="{{ Auth::user()->name }}" class="rounded-t-lg md:rounded-s-lg object-fill">
                </div>
            </div>

            <section class="p-4 sm:p-8 md:w-1/2 lg:w-3/4">

                <header class="flex justify-between">
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Account Information') }}
                    </h2>
                    <div>
                        <x-element.dropdown.container>
                            <x-slot:trigger>
                                <button class="flex items-center gap-3">
                                    <div class="ml-1 text-slate-400">
                                        <svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot:trigger>

                            <x-slot:content>
                                <button class="flex gap-3 items-center w-full px-3 py-1 text-slate-500 hover:text-yellow-700 hover:bg-yellow-100 hover:rounded-full" @click="$dispatch('open-modal', {name: 'change-password-form-modal'})">
                                    <x-heroicon-s-key width="16" />
                                    Reset Password
                                </button>
                                <button class="flex gap-3 items-center w-full px-3 py-1 text-slate-500 hover:text-yellow-700 hover:bg-yellow-100 hover:rounded-full" @click="$dispatch('open-modal', {name: 'update-account-form-modal', id: {{ auth()->id() }}})">
                                    <x-heroicon-s-pencil width="16" />
                                    Edit
                                </button>
                            </x-slot:content>
                        </x-element.dropdown.container>

                    </div>
                </header>
                <main class="flex flex-col text-gray-900">
                    <div class="flex flex-row">
                        <div class="w-1/3 p-4 border-b border-b-gray-700">
                            Name
                        </div>
                        <div class="w-2/3 p-4 border-b border-b-gray-700">
                            {{ auth()->user()->name }}
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="w-1/3 p-4 border-b border-b-gray-700">
                            Email
                        </div>
                        <div class="w-2/3 p-4 border-b border-b-gray-700">
                            {{ auth()->user()->email }}
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="w-1/3 p-4 border-b border-b-gray-700">
                            Email Status
                        </div>
                        <div class="w-2/3 p-4 border-b border-b-gray-700">
                            @if (auth()->user()->hasVerifiedEmail())
                                <span>👍 Verified</span>
                            @else
                                <span wire:click="verifyEmail" class="cursor-pointer">👎 Unverified</span>
                                <span x-show="emailNotif" x-cloak x-transition
                                    class="px-4 py-2 mx-6 text-gray-800 bg-green-400 rounded">
                                    Email Sent
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="w-1/3 p-4 border-b border-b-gray-700">
                            Role
                        </div>
                        <div class="w-2/3 p-4 border-b border-b-gray-700">
                            {{ auth()->user()->roles->first()->name }}
                        </div>
                    </div>
                </main>
            </section>
        </div>

        {{-- Profile Information --}}
        @if (!auth()->user()->profile_information->isEmpty())
            <div class="p-4 bg-white shadow rounded-lg sm:p-8">
                <section>

                    <header class="flex justify-between">
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile Information') }}
                        </h2>
                        <div>
                            <x-element.button.primary
                                x-on:click="$dispatch('open-modal', {name: 'update-profile-form-modal', id: {{ auth()->id() }}})">
                                <x-heroicon-s-pencil width="16" />
                            </x-element.button.primary>
                        </div>
                    </header>
                    <div class="flex flex-col text-gray-900">
                        @foreach (auth()->user()->profile_information as $info)
                            <div class="flex flex-row">
                                <div class="w-1/3 p-4 border-b border-b-gray-700">
                                    {{ $info->name }}
                                </div>
                                <div class="w-2/3 p-4 border-b border-b-gray-700">
                                    @if ($info->type == 'date')
                                        {{ date('d M Y', strtotime($info->value)) }}
                                    @else
                                        {{ $info->value }}
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>
            </div>
        @endif

        {{-- Delete Account --}}
        <div class="p-4 bg-white shadow rounded-lg sm:p-8">
            <div class="max-w-xl">
                <section class="space-y-6">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Delete Account') }}
                        </h2>

                        <p class="mt-1 text-sm text-gray-600">
                            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
                        </p>
                    </header>

                    <x-element.button.danger type="button"
                        x-on:click="$dispatch('open-modal', {name: 'confirm-user-deletion-modal'})">
                        {{ __('Delete Account') }}
                    </x-element.button.danger>
                </section>
            </div>
        </div>
    </div>

    <livewire:profile.update-account-form-modal />
    <livewire:profile.update-profile-form-modal />
    <livewire:profile.confirm-user-deletion-modal />
    <livewire:profile.change-password-form-modal />
</section>
