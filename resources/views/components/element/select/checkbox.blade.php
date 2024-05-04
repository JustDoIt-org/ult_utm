@props(['name' => null, 'required' => false, 'disabled' => false, 'label' => null, 'style' => 'rounded bg-white border-gray-300 text-yellow-700 shadow-sm focus:ring-indigo-500'])

@php($name = $name ?? $attributes->wire('model')->value)

<label for="{{ $name }}" class="inline-flex items-center">
    <input id="{{ $name }}"
        {{ $attributes->merge([
            'type' => 'checkbox',
            'name' => $name,
            'required' => $required,
            'disabled' => $disabled,
            'class' => $style,
        ]) }} />
    @isset($label)
        <span class="ml-2 text-sm">{{ __($label) }}</span>
    @endisset
</label>
