@props(['disabled' => false, 'required' => false, 'style' => 'h-9 border-gray-300 focus:border-yellow-500 focus:ring-yellow-500 rounded-md shadow-sm'])

@php($name = $attributes->wire('model')->value ?? $attributes->get('name'))
@php($id = $attributes->wire('model')->value ?? $attributes->get('id'))

<input
    {{ $attributes->merge([
        'disabled' => $disabled,
        'required' => $required,
        'name' => $name,
        'id' => $id,
        'class' => $style,
    ]) }} />
