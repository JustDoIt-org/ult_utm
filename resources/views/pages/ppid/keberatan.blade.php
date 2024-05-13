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
          <div class="flex">
            <button
              class="bg-yellow-500 flex gap-2 items-center justify-center hover:bg-yellow-700 text-white font-bold py-1 px-2 rounded">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                <path fill-rule="evenodd"
                  d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                  clip-rule="evenodd" />
              </svg>
              <p class="align-middle">Lacak Permohonan</p>
            </button>
          </div>
        </form>
      </div>
    </div>
  </x-section.ppid.container>
@endsection
