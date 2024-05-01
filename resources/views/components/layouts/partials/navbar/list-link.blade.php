@props(['items' => null])

<ul class="flex gap-x-4">
  @foreach ($items as $item)
    <li>
      <a href="{{ $item['link'] }}"
        class="border-transparent hover:border-b-4 hover:pb-1 hover:border-b-slate-700 transition duration-700">{{ $item['name'] }}</a>
    </li>
  @endforeach
</ul>
