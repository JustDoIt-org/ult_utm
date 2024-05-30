@props([
    'cols' => null,
    'rows' => null,
    'sort_direction' => null,
    'sort_by' => null,
    'modals' => [],
    'url' => [],
    'permissions' => [],
    'perPage' => 'perPage',
    'export' => [],
    'import' => [],
])

<div class="block">
    <div class="flex flex-row justify-between">
        <div>
            @if ($perPage != '')
                <x-element.select.dropdown wire:model.live='{{ $perPage }}'>
                    <option>5</option>
                    <option>10</option>
                    <option>15</option>
                    <option>20</option>
                    <option>25</option>
                </x-element.select.dropdown>
            @endif
        </div>
        <div class="flex flex-row gap-1">
            @if (!empty($export))
                <x-element.dropdown.container>
                    <x-slot:trigger>
                        <x-element.button.primary>
                            <x-heroicon-o-cloud-arrow-down width="16" height="16" />
                            &nbsp;Export
                        </x-element.button.primary>
                    </x-slot:trigger>
                    <x-slot:content>
                        @foreach ($export as $label => $method)
                            <x-element.button.flat class="w-full p-2" wire:click='{{ $method }}'
                                x-on:click="open = false;">
                                {{ strtoupper($label) }}
                            </x-element.button.flat>
                        @endforeach
                    </x-slot:content>
                </x-element.dropdown.container>
            @endif
            @if (!empty($import))
                <x-element.dropdown.container>
                    <x-slot:trigger>
                        <x-element.button.primary>
                            <x-heroicon-o-cloud-arrow-down width="16" height="16" />
                            &nbsp;Import
                        </x-element.button.primary>
                    </x-slot:trigger>
                    <x-slot:content>
                        @foreach ($import as $label => $method)
                            <x-element.button.flat class="w-full p-2" wire:click='{{ $method }}'
                                x-on:click="open = false;">
                                {{ strtoupper($label) }}
                            </x-element.button.flat>
                        @endforeach
                    </x-slot:content>
                </x-element.dropdown.container>
            @endif
        </div>
    </div>

    <div class="flex flex-col"
        @if (isset($permissions['delete']) && $permissions['delete']) x-on:ask.window="window.Swal.fire({
            title: 'Are You Sure?',
            text: $event.detail.message,
            showCancelButton: true,
            customClass: {
                popup: 'bg-yellow-300 text-gray-800'
            }
        }).then((e) => {e.isConfirmed && $wire[$event.detail.dispatch]($event.detail.id)})" @endif>
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden">
                    <table class="min-w-full text-sm font-light text-left">
                        <thead class="font-bold border-t-2 border-b-2 border-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-4">#</th>
                                @foreach ($cols as $col)
                                    <th scope="col"
                                        class="@if (isset($col['sort'])) cursor-pointer @endif px-6 py-4"
                                        @if (isset($col['sort'])) wire:click="sort('{{ $col['query'] }}')" @endif>
                                        <div class="flex items-center gap-3">
                                            <span>{{ __($col['label']) }}</span>
                                            <span>
                                                @if (isset($col['sort']) && !is_null($col['sort']))
                                                    @if ($sort_by == $col['query'])
                                                        @if ($sort_direction == 'asc')
                                                            <x-heroicon-s-chevron-up width="16" />
                                                            <x-heroicon-s-chevron-down
                                                                class="text-gray-200"
                                                                width="16" />
                                                        @elseif($sort_direction == 'desc')
                                                            <x-heroicon-s-chevron-up
                                                                class="text-gray-200"
                                                                width="16" />
                                                            <x-heroicon-s-chevron-down width="16" />
                                                        @endif
                                                    @else
                                                        <x-heroicon-s-chevron-up width="16" />
                                                        <x-heroicon-s-chevron-down width="16" />
                                                    @endif
                                                @endif
                                            </span>
                                        </div>
                                    </th>
                                @endforeach
                                <th scope="col" class="px-6 py-4"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rows as $key => $row)
                                <tr class="border-b" wire:key="{{ $key }}">
                                    <td class="px-6 py-4 font-medium whitespace-nowrap">
                                        @if ($rows instanceof \Illuminate\Pagination\LengthAwarePaginator)
                                            {{ ($rows->currentPage() - 1) * $rows->perpage() + $loop->iteration }}
                                        @else
                                            {{ $loop->iteration }}
                                        @endif
                                    </td>
                                    @foreach ($cols as $col)
                                        @php($chain = explode('.', $col['query']))
                                        @php($ev = 'return $row["' . implode('"]["', $chain) . '"] ?? " - ";')
                                        @php($dt = eval($ev))
                                        @if (isset($column['type']) && !is_string($column['type']))
                                            <td class="px-6 py-4 whitespace-nowrap">{!! $column['type']($dt) !!}</td>
                                        @else
                                            @switch($col['query'])
                                                @case('photo')
                                                    <td class="px-6 py-4 whitespace-nowrap">
                                                        <div class="w-24 rounded-lg h-12 flex items-center">
                                                            <img src="storage/{{$dt}}" alt="" class="object-cover max-w-[100px] w-full rounded-lg h-[60px]">
                                                        </div>
                                                    </td>
                                                    @break
                                                @case('answer')
                                                    <td class="px-6 py-4 whitespace-nowrap w-full">
                                                        <p class="w-[250px] md:w-[400px] truncate">{{ __($dt) }}</p>
                                                    </td>
                                                    @break
                                                @case('progress')
                                                    <td class="pl-14 box-border">

                                                        @if ($dt == 'belum')
                                                            <img alt="{{ $dt }}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABzklEQVR4nM2Xu0oDQRSGP1CsFI2PIMHCxl4FL4h3LcQ3EGMnGsHewspLYaW1L2CrUfEdRMgjeItBu8Til8ETCGEvs9kkOPDDMjs735wzZ86chf/YBN2CnGC8k9B5QVHwIlixvoxgQ5AXnJny1pdpBfRAUBEcCnoFS4I7wY9AIaoKCoLFZqGXgrJgTjAseIyAhelekE1qaVkwIpgVfDYBrakkmPHd04pZOmuui5o4Z4oaU42E6y96i7anw56W+oBrlmfDwNuCV0Gf7Y9aCHZ6DANPCJYtetUGsAQLUS6/ayP4Ngw6GHNO04KrgUnGso/aCJZgPQi83wFwPgh8mmCCkuXtjD37fneSFvwu6K9LsanA+wnd9ia4EPQIrtK4eiMhuKarBPD1IHDGIz/Hwa8jxlRq2xMELzQJlkHfIt7fBEINvJgCHKc5wapgrBVp01cPdgG5MmozDJxNeDbj9CEYEhwLngRdUS6fSRFo9XJzTAvWLLgmQ6EN8FJKS6cEo4JvwU4stMHtvoVBvQrmXnfHfwnOvaENC1hw92mM+50rbyx6XSAdWd9uU9CGBQy47CPYs2L+1J5d34CNWbEy6tmryqRFzf3uCLZcAdkxaJL2C2LSRTbC3CXeAAAAAElFTkSuQmCC">
                                                        @endif

                                                        @if ($dt == 'diproses')
                                                            <img alt="{{ $dt }}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAACnElEQVR4nNWXyWsUURDGPyEgiAtuqAcXvMQgKi4ogqBnEVEUl/8hRxfwoicP0YSAIKOHiYqCG3iQkJPkoImHjAeHMV3Vw4AgEfVmVBS3T17P657XMz0z6ZmMYkPB8Lrq/aqq36uqAf6Xh3kspuAOBc+pGKNgmIp+Co6xhEWtberhIAUZCq7FRNEb6ShOUMFEEXyj4CYVPenAgo8NNt0Q6BQwn4oBCrIBxEQseFOl/4OCy/Qx1wlqH33sTQYrzlExQcXrGrCH7Q2dLmIjBX1VzudYwEp6WEfBr0BeYW29qJdRIWnBkb0BKe47mSpSsb/hPpzCPHtoQuDttOBoL8UpCn5b+PvGYMFFx9OzRqlVsIWfbpo5KtYHp7Ks8ChY89DtGHS3dDsUn5qBw7ROs4jVznqve51m4XZsrigWsMSJdjANpMntyMVEkOUoulwPjzte7WwXnMbDQQt9S2LO3wNLUG8NeKxjDMUuKp6amu6Cxy34bsfAgow9XOPuYrloCLIdAytu2eCeuYv3LPhSB8EjlvG4sjiJpVScNJ2ng+CpTgdXC/WwKbquPo7EX/pYHtRmV4rYZhpH22BFv432Kz0siEPrl7l8W9Bym5y24KH4S7cL1crLFJFdoOALBYeiNcFDu8/3cIppBn6QNtW2PpvIMhZ6xmkOfbUGLljwwfl9fqZQC85Zu+tBPw8HAcWEO38lg30coKDkwIfNzJQKHO/BPktYkWxgUloBb+UkVlHwwjH+TMEVFrG7URNxwKHT74J5q4Q1yQZm1lLkzUEKv6lJTTCimlE1/u1NIRix8/NVethRF1xx4CcFe2aSNTeKHgpuOINCtTyJdAVDswZGuKmPhfRw1JQ820bN3xfTXA5HOqPoomJLQiGKRql//vwBpAx4oM9SHQYAAAAASUVORK5CYII=">
                                                        @endif

                                                        @if ($dt == 'selesai')
                                                            <img alt="{{ $dt }}" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAABuUlEQVR4nO2Wu0oDURCG/ySFaJHszGoh2MXewsZeooLxUvkcVnaCVVCxsVbjA3hpLHwHQUxawZ2zAUMaBbWKhSu7QWPInr3biAPTZE/mY+4D/EsUeZwcQ2tiuqdTo/g1cZCHba5C0SkUdaDYGVT3N6rDNla8t5mI0BIUN4dhWm3A4oU0XhYgvBsDOKhCh56N2FBFl4mh/RRcxAu94oP00C/PeS8atJdTJ1O1uRIW4jwU32UOVtwMDrnXMqnC+gRhy/+7UQ3Irduniav4Bq0iw0HOvzDpJAjcSQyVkvHDTs3nTVs/BvVtsQXLmIHi61Co8BwUvfraafmNV7tY1njz9v3mHiMQvgqBvuiru1iODvb+QBtD8LhQpQMHhpq7sMy1AfgDlWJBlS7U4cU1CI8LFV1x9cD1EAPvEHO9n57xWQg/R+zxIz3Y3afhRrpQvA3hzUie9jtjWQ92x5rQbaJeDtZG+JayaDFTqPAHlDmPSCK8nx2catGgvZAXIHSe3ls6i3+DOchBaCfl6ZPi8LO5EmtHe8UZNadh4h0IRtVbbe4gGIa1IXTstUxm562fuKPPnbuu/upBjz8kn2ngdQoQFG+/AAAAAElFTkSuQmCC">
                                                        @endif

                                                    </td>
                                                    @break
                                                @default
                                                    <td class="px-6 py-4 whitespace-nowrap">{{ __($dt) }}</td>
                                            @endswitch
                                        @endif
                                    @endforeach
                                    <td class="flex items-center justify-center px-6 py-4 whitespace-nowrap">
                                        <div
                                            class="inline-flex items-center justify-center overflow-hidden text-white rounded-md">
                                            @if (isset($permissions['view']) && $permissions['view'])
                                                @if (isset($modals['view']))
                                                    <x-element.button.flat wire:offline.attr="disabled"
                                                        wire:loading.attr="disabled"
                                                        class="p-1 bg-blue-300 rounded-none disabled:bg-blue-200"
                                                        wire:click="$dispatch('open-modal', {name: '{{ $modals['view'] }}', id: {{ $row['id'] }}})">
                                                    </x-element.button.flat>
                                                @elseif(isset($url['view']))
                                                    @php($view_url = $url['view'])
                                                    @php($view_route = $url['view']['route'])
                                                    @php($view_params = [])
                                                    @foreach ($route['view']['params'] as $key => $value)
                                                        @php($view_params[$key] = $row[$value])
                                                    @endforeach
                                                    <x-element.anchor
                                                        href="{{ route($view_route, $view_params) }}">
                                                        <x-heroicon-s-eye width="16" class="pointer-events-none" />
                                                    </x-element.anchor>
                                                @endif
                                            @endif

                                            @if (isset($permissions['edit']) && $permissions['edit'])
                                                @if (isset($modals['edit']))
                                                    <x-element.button.flat wire:offline.attr="disabled"
                                                        wire:loading.attr="disabled"
                                                        class="p-1 bg-blue-600 rounded-none disabled:bg-blue-400"
                                                        wire:click="$dispatch('modal:{{ $modals['edit'] }}:load', {id: {{ $row['id'] }}})">
                                                        <x-heroicon-s-pencil width="16"
                                                            class="pointer-events-none" />
                                                    </x-element.button.flat>
                                                @elseif(isset($url['edit']))
                                                    @php($edit_url = $url['edit'])
                                                    @php($edit_route = $url['edit']['route'])
                                                    @php($edit_params = [])
                                                    @foreach ($route['edit']['params'] as $key => $value)
                                                        @php($edit_params[$key] = $row[$value])
                                                    @endforeach
                                                    <x-element.anchor
                                                        href="{{ route($edit_route, $edit_params) }}">
                                                        <x-heroicon-s-pencil width="16"
                                                            class="pointer-events-none" />
                                                    </x-element.anchor>
                                                @endif
                                            @endif
                                            @if (isset($permissions['delete']) && $permissions['delete'])
                                                <x-element.button.flat wire:offline.attr="disabled"
                                                    x-on:click="$dispatch('ask', {message: 'Are you sure want to delete ?', dispatch: 'delete', id: {{ $row['id'] }} })"
                                                    class="p-1 bg-red-700 rounded-none disabled:bg-red-500">
                                                    <x-heroicon-s-trash width="16" class="pointer-events-none" />
                                                </x-element.button.flat>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        {{-- <tfoot class="font-bold border-t-2 border-b-2 border-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-4">#</th>
                                @foreach ($cols as $col)
                                    <th scope="col"
                                        class="@if (isset($col['sort'])) cursor-pointer @endif px-6 py-4"
                                        @if (isset($col['sort'])) wire:click="sort('{{ $col['query'] }}')" @endif>
                                        <div class="flex items-center gap-3">
                                            <span>{{ __($col['label']) }}</span>
                                            <span>
                                                @if (isset($col['sort']))
                                                    @if ($sort_by == $col['query'])
                                                        @if ($sort_direction == 'asc')
                                                            <x-heroicon-s-chevron-up width="16" />
                                                            <x-heroicon-s-chevron-down
                                                                class="text-gray-200"
                                                                width="16" />
                                                        @elseif($sort_direction == 'desc')
                                                            <x-heroicon-s-chevron-up
                                                                class="text-gray-200"
                                                                width="16" />
                                                            <x-heroicon-s-chevron-down width="16" />
                                                        @endif
                                                    @else
                                                        <x-heroicon-s-chevron-up width="16" />
                                                        <x-heroicon-s-chevron-down width="16" />
                                                    @endif
                                                @endif
                                            </span>
                                        </div>
                                    </th>
                                @endforeach
                                <th scope="col" class="px-6 py-4"></th>
                            </tr>
                        </tfoot> --}}
                    </table>
                </div>
            </div>
        </div>
        <div class="overflow-x-auto">
            @if ($rows instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $rows->links() }}
            @endif
        </div>
    </div>
</div>
