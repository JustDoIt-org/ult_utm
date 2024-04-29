@props(['items' => null, 'type' => 'desktop'])
@php
  $classes = $type === 'desktop' ? 'flex items-center' : 'flex flex-col gap-y-4 mt-5';
@endphp

<ul {{ $attributes->merge(['class' => $classes]) }}>
  @foreach ($items as $item)
    <x-element.navbar.link :name="$item['name']" :link="$item['link']" />
  @endforeach
</ul>
