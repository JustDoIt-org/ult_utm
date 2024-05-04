@props(['value', 'style' => 'text-slate-600'])

<label {{ $attributes->merge(['class' => $style]) }}>
    {{ $value ?? $slot }}
</label>
