<x-layouts.guest>
    <div class="flex flex-col gap-10 md:w-[450px]">
        <div class="flex flex-col gap-3">
            <div class="flex justify-center items-center rounded-full p-3 w-24 h-24 border-4 border-yellow-600 text-yellow-600 m-auto">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-20 h-20">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                </svg>
            </div>
            <h1 class="text-center font-semibold text-2xl">Verify Your Email</h1>
        </div>

        <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex flex-col gap-5 items-center w-full">
            <form method="POST" action="{{ route('verification.send') }}" class="w-full">
                @csrf

                <button type="submit" class="bg-yellow-600 w-full text-white text-xl font-semibold py-3 rounded-full">
                    @if (session("status") == "verification-link-sent")
                        {{ __('Resend Verification Email') }}
                    @else
                        {{ __('Verification Email') }}
                    @endif
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="hover:underline hover:font-bold text-slate-700">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </div>
</x-layouts.guest>
