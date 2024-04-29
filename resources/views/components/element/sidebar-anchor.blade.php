@props(['route' => 'javascript:void(0)'])

@php
    $classes = (Route::is($route)) ? "flex gap-5 p-4 font-semibold border-l-4 border-yellow-500 bg-yellow-50 text-yellow-800" : "flex gap-5 p-4 text-slate-400 font-semibold hover:bg-slate-50 hover:text-slate-600"
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}
    href="{{ route($route) }}" wire:navigate>
    {{ $slot }}
</a>
