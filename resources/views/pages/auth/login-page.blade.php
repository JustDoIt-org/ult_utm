<div class="flex flex-col md:flex-row gap-6 md:gap-0 justify-around items-center">
    <form method="POST" wire:submit="send" class="w-full">
        <h1 class="font-semibold text-3xl mb-2">Sign In</h1>
        <p class="text-sm text-slate-600">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Esse repellendus vitae explicabo.</p>

        <x-element.layout.vertical name="form.email" label="Email">
            <x-element.input.line wire:model="form.email" />
        </x-element.layout.vertical>

        <x-element.layout.vertical name="form.password" label="Password">
            <x-element.input.line type="password" wire:model="form.password" />
        </x-element.layout.vertical>

        <div class="flex md:flex-col justify-between items-center">
            <!-- Remember Me -->
            <div class="block mt-1 w-full whitespace-nowrap">
                <x-element.select.checkbox wire:model="form.remember" label="Remember Me" />
            </div>

            @if (Route::has('password.request'))
                <x-element.anchor :href="route('password.request')" class="underline md:w-full text-sm text-nowrap md:mt-2">
                    {{ __('Forgot your password?') }}
                </x-element.anchor>
            @endif
        </div>

        <button type="submit" class="text-white font-semibold border border-yellow-700 bg-yellow-600 rounded-full py-2 w-full text-center mt-5">
            {{ __('Sign in') }}
        </button>
    </form>

    <div class="w-full md:w-[70%] flex md:flex-col items-center gap-2">
        <div class="w-full border-t-2 md:rotate-90 md:-translate-y-[90px] md:scale-75 border-slate-300"></div>
        <span class="text-slate-400">OR</span>
        <div class="w-full border-t-2 md:rotate-90 md:translate-y-[90px] md:scale-75 border-slate-300"></div>
    </div>

    <div class="w-full flex flex-col items-center gap-3">
        <a href="/auth/redirect" class="flex flex-row items-center justify-center gap-5 font-semibold border border-slate-800 bg-white rounded-full py-1 w-full text-center">
            <x-element.icons.icon-google />
            {{ __('Continue with Google') }}
        </a>
        <span class="text-sm">Don't have an account ? <a wire:navigate href="{{route('register')}}" class="font-bold text-yellow-700 hover:underline cursor-pointer">Sign up</a></span>
    </div>
</div>