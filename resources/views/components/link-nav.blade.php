@props(["link" => "", "nameLink" => "Link"])

@php
    $classes = (request()->routeIs($link)) ? "flex items-center gap-5 p-5 border-l-[6px] border-blue-500 font-semibold text-blue-700" : "flex items-center gap-5 p-5 font-semibold text-slate-500"
@endphp

<a wire:navigate href="{{ route($link) }}" {{ $attributes->merge(['class' => $classes]) }}>
    <span>{{ $slot }}</span>
    <span>{{ $nameLink }}</span>
</a>

