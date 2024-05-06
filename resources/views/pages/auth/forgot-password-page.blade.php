<div>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    @if ($status)
        <span class="text-sm text-white font-semibold bg-green-600 px-2 py-1 rounded-full">{{ $status }}</span>
    @endif

    <form wire:submit="send_reset">
        @csrf
        <!-- Email Address -->
        <x-element.layout.vertical name="email" label="Email">
            <x-element.input.line wire:model="email" />
        </x-element.layout.vertical>

        <div class="flex items-center justify-end mt-4">
            <x-element.button.primary>
                {{ __('Email Password Reset Link') }}
            </x-element.button.primary>
        </div>
    </form>
</div>
