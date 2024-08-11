<x-layouts.partials.multiple-sidebar :$title view="admin">
  @if ($errors->any())
    <div class="alert alert-danger card mx-2 text-white"">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  @if (session('data'))
    <div class="alert alert-success card mx-2 text-white" role="alert">
      {{ session('data') }}
    </div>
  @endif
  @if (session('failed'))
    <div class="alert alert-danger card mx-2 text-white" role="alert">
      {{ session('failed') }}
    </div>
  @endif
  @if (session('sukses'))
    <script>
      var data = {!! json_encode(session('sukses')) !!}
      window.swal.fire({
        // title: 'success',
        // message: 'success',
        // type: 'success',
        title: data['title'],
        message: data['message'],
        type: data['type']
      })
    </script>
  @endif
  @isset($tableType)
    @if ($tableType == 'list_layanan')
      <livewire:layanan.list-layanan :$type />
    @elseif ($tableType == 'admin_lt')
      <livewire:layanan.admin-lt :$type />
    @endif
  @else
    <livewire:layanan.riwayat-layanan-terpadu :$type />
  @endisset
</x-layouts.partials.multiple-sidebar>
