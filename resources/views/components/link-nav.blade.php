@props(['link' => "/", 'nameLink' => "Link"])

<a wire:navigate href="{{ $link }}" class="flex items-center gap-5 p-5 border-l-[5px] border-blue-700">
    <div class="font-bold text-blue-700">
        {{ $slot }}
    </div>
    <span class="font-semibold">{{ $nameLink }}</span>
</a>

