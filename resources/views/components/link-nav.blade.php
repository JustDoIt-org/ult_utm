@props(["link" => "", "nameLink" => "Link"])

@php
    $classes = (request()->routeIs($link)) ? "flex items-center gap-5 p-5 border-l-[6px] border-blue-500" : "flex items-center gap-5 p-5"
@endphp

<a wire:navigate href="{{ route($link) }}" {{ $attributes->merge(['class' => $classes]) }}>
    <div class="font-bold text-blue-700">
        {{ $slot }}
    </div>
    <span class="font-semibold">{{ $nameLink }}</span>
</a>

