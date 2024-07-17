<div class="card m-4 p-4">
  <h1 class="text-center">{{ __('Form Layanan Terpadu') }}</h1>
  <form wire:submit='save'>

    @foreach ($data as $item)
      @if (isset($item['select_item']))
        <x-element.input.input-bootstrap :title="$item['title']" :model="$item['model']" :type="$item['type']" :select_item="$item['select_item']" />
      @else
        <x-element.input.input-bootstrap :title="$item['title']" :model="$item['model']" :type="$item['type']" />
      @endif
    @endforeach
 
    <x-element.button.submit-bootstrap target="save, file" buttonName="Kirim Permohonan" position="middle" />
  </form>
  @if (session('data'))
    {{ session('data') }}
  @endif
</div>
