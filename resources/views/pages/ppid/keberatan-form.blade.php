<div class="flex">
  <div class="ml-3 mr-3 my-2">
    <p class="text-xs text-gray-500">{{ $desc }}</p>
    <form wire:submit='send'>
      <x-element.input.input-text-field field="No Permohonan" size="max-w-[500px]" textSize="md" model="field_search" />

      <x-element.button.submit-ppid target="send" buttonName="Lacak Permohonan" position="left"
        icon="magnifying-glass" />
    </form>
    @if ($data_found)
      <div class="w-full bg-gray-200  pb-6 rounded-lg mt-3 p-3 justify-center">
        <h2 class="text-center uppercase text-2xl font-semibold">{{ $data_found->status->type }}</h2>
        {{-- <p>{{ $data_found->id }}</p> --}}
        @php
          $type = $data_found->status->type;
          if ($type == 'request') {
              $field_data = [
                  ['Status', $data_found->status->progress],
                  ['Username', $data_found->status->user->name],
                  ['Uraian', $data_found->status->uraian],
                  ['Alamat', $data_found->alamat],
                  ['pekerjaan', $data_found->pekerjaan],
                  ['kategori pemohon', $data_found->kategori_pemohon],
                  ['rincian informasi', $data_found->rincian_informasi],
                  ['tujuan penggunaan', $data_found->tujuan_penggunaan],
                  ['cara memperoleh informasi', $data_found->memperoleh_informasi],
                  ['cara memperoleh salinan', $data_found->memperoleh_salinan],
              ];
          } else {
              $field_data = [
                  ['Status', $data_found->status->progress],
                  ['Username', $data_found->status->user->name],
                  ['Uraian', $data_found->status->uraian],
                  ['NIK', $data_found->nik],
                  ['Judul', $data_found->judul],
                  ['Saran', $data_found->saran],
              ];
          }
        @endphp
        <table class="table-auto flex justify-center">
          <tbody class="flex flex-col justify-center mt-5">
            @foreach ($field_data as $item)
              @if ($item[1])
                <tr class=" hover:scale-105 transition-all flex justify-between p-3 mb-2 rounded-md bg-white shadow-lg">
                  <td class="w-1/4  mr-2 capitalize">{{ $item[0] }}</td>
                  <td class="text-wrap w-3/4 capitalize">: {{ $item[1] }}</td>
                </tr>
              @endif
            @endforeach
            <tr class=" mt-5 flex justify-between">
              @if ($data_found->status->file)
                <td>
                  <a href={{ '/storage' . $data_found->status->file }} target="_blank"
                    class="p-3 bg-secondary text-white rounded-md hover:bg-primary transition-all">
                    Download File {{ $type == 'request' ? 'KTP' : '' }}
                  </a>
                </td>
              @endif
              <td>
                @if ($data_found->status->file_balasan)
                  <a href={{ '/storage' . $data_found->status->file }} target="_blank"
                    class="p-3 bg-secondary text-white rounded-md hover:bg-primary transition-all">Download
                    File Balasan</a>
                @else
                  <a disabled class="p-3  text-white rounded-md bg-gray-500 transition-all">File
                    Balasan Belum
                    Ada</a>
                @endif
              </td>
            </tr>

          </tbody>
        </table>
        {{-- <img src="/storage/{{ $data_found->status->file }}" alt="" width="100"> --}}
      </div>
    @endif
    @if (session()->has('message'))
      <div class="text-red-600">
        {{ session('message') }}
      </div>
    @endif
  </div>

</div>
