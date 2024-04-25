<script>
    document.addEventListener('alpine:init', () => {
        Alpine.store('sidebar', {
            isActive: true
        })
    })
</script>

<div x-data class="min-w-[345px]">
    <nav class="flex items-center justify-between h-14 bg-white p-5">
        <button @click="$store.sidebar.isActive = !$store.sidebar.isActive" class="sm:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                <path fill-rule="evenodd" d="M3 6.75A.75.75 0 0 1 3.75 6h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 6.75ZM3 12a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75A.75.75 0 0 1 3 12Zm0 5.25a.75.75 0 0 1 .75-.75h16.5a.75.75 0 0 1 0 1.5H3.75a.75.75 0 0 1-.75-.75Z" clip-rule="evenodd" />
            </svg>
        </button>

        <h1 class="text-left hidden sm:block font-bold text-xl text-blue-700">Logo Company</h1>

        <h1 class="font-semibold text-xl text-blue-950">Dashboard</h1>
        <div class="bg-blue-500 w-10 h-10 rounded-full flex justify-center items-center font-semibold text-white">A</div>
    </nav>
</div>
