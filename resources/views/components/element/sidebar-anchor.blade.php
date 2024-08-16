@props(['route' => 'javascript:void(0)'])

@php
    $classes = (Route::is($route)) ? "flex items-center gap-5 p-4 mx-[9px] bg-secondary text-white rounded-xl" : "flex gap-5 items-center rounded-xl p-4 mx-[9px] text-slate-400 hover:bg-slate-50 hover:text-slate-600"
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}
    href="{{ route($route) }}" wire:navigate>
    {{ $slot }}
</a>
