@props(['items' => null, 'type' => 'desktop'])
@php
  $classes = $type === 'desktop' ? 'flex items-center' : 'flex flex-col gap-y-4 mt-5';
@endphp

<ul {{ $attributes->merge(['class' => $classes]) }}>
  @foreach ($items as $item)
    <li>
      <a href="{{ $item['link'] }}"
        class="border-transparent hover:border-b-4 hover:pb-1 hover:border-b-slate-700 transition duration-700">{{ $item['name'] }}</a>
    </li>
  @endforeach
</ul>
