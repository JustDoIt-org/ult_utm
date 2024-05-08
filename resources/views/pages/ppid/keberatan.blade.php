@extends('components.layouts.multiple')

@section('content')
  <x-section.ppid.container :$title>
    <div class="flex">
      <div class="ml-3 mr-1 my-2">
        <p class="text-xs text-gray-500">Silakan
          ajukan keberatan saudara apabila permohonan informasi belum terlayani
          selama
          10 hari kerja
          atau jawaban
          atas permohonan informasi tidak sesuai dengan memasukkan nomor permohonan yang bersangkutan.</p>
        <p class="text-md">No. Permohonan</p>
        <form action="">
          <div class=" mt-2 mb-5">
            <input type="text" id="first_name"
              class="bg-gray-50 border max-w-[500px] border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5"
              required />
          </div>
          <div class=" flex">
            <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
              Lacak Permohonan
            </button>
          </div>
        </form>
      </div>
    </div>
  </x-section.ppid.container>
@endsection
