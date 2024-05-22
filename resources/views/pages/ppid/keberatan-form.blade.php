<div class="flex">
  <div class="ml-3 mr-1 my-2">
    <p class="text-xs text-gray-500">{{ $desc }}</p>
    <form wire:submit='send'>
      <x-element.input.input-text-field field="No Permohonan" size="max-w-[500px]" textSize="md" model="field_search" />

      <x-element.button.submit-ppid target="send" buttonName="Lacak Permohonan" position="left"
        icon="magnifying-glass" />
    </form>
    @if ($data_found)
      <div>
        {{-- <p>{{ $data_found->id }}</p> --}}
        <p>{{ $data_found->progress }}</p>
        <p>{{ $data_found->user->name }}</p>
        <p>{{ $data_found->jenis }}</p>
        <p>{{ $data_found->nik }}</p>
        <p>{{ $data_found->judul }}</p>
        <p>{{ $data_found->uraian }}</p>
        <p>{{ $data_found->saran }}</p>
        <img src="/storage/{{ $data_found->file }}" alt="" width="100">
      </div>
    @endif
    @if (session()->has('message'))
      <div class="text-red-600">
        {{ session('message') }}
      </div>
    @endif
  </div>

</div>
