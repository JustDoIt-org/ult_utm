@props(['name', 'link'])

<li>
    <a href="{{ $link }}"
    class="border-transparent hover:border-b-4 hover:pb-1 hover:border-b-slate-700 transition duration-700">{{ $name }}</a>
</li>
