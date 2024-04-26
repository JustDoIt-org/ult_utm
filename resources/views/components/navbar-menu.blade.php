<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('sidebar', {
            isActive: false
        })
    })
</script>

<div x-data class="fixed top-0 left-0 right-0 min-w-[300px]">
    <nav class="flex items-center justify-between h-14 bg-white p-5">
        <button @click="$store.sidebar.isActive = !$store.sidebar.isActive" class="md:hidden">
            <svg x-bind:class="$store.sidebar.isActive && 'hidden'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
            </svg>

            <svg x-bind:class="!$store.sidebar.isActive && 'hidden'" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
        </button>

        <h1 class="text-left hidden md:block font-bold text-xl text-blue-700">Logo Company</h1>

        <h1 class="font-semibold text-xl text-blue-950">Dashboard</h1>
        <div class="bg-blue-500 w-10 h-10 rounded-full flex justify-center items-center font-semibold text-white">A</div>
    </nav>
</div>
