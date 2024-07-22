<div class="card m-4 p-4">
  <h1 class="text-center">{{ __($title) }}</h1>
  <form wire:submit='save'>

    @foreach ($data as $item)
      @php
        $model = $item['model'];
      @endphp
      @if (isset($item['select_item']))
        <x-element.input.input-bootstrap :title="$item['title']" :model="$item['model']" :type="$item['type']" :select_item="$item['select_item']" />
        @if ($$model == 'Lainnya')
          <x-element.input.input-bootstrap title="Silahkan Isi" model="lainnya" />
        @endif
      @else
        <x-element.input.input-bootstrap :title="$item['title']" :model="$item['model']" :type="$item['type']" />
      @endif
    @endforeach
    <x-element.button.submit-bootstrap target="save, file" buttonName="Kirim Permohonan" position="middle" />
  </form>
  {{-- @if (session('data'))
    {{ session('data') }}
  @endif --}}
</div>
