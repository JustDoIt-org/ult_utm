@props(['disabled' => false, 'required' => false])

@php($name = $attributes->wire('model')->value ?? $attributes->get('name'))
@php($id = $attributes->wire('model')->value ?? $attributes->get('id'))

<select
    {{ $attributes->merge([
        'disabled' => $disabled,
        'required' => $required,
        'name' => $name,
        'id' => $id,
        'class' =>
            'border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm',
    ]) }}>
    {{ $slot }}
</select>
