@props(['title' => '', 'subTitle' => ''])

<div>
  <h1 class="text-2xl mt-3 mb-4 ml-3">{{ $title }}</h1>
  <div class=" bg-slate-50 border-solid border-2 md:mr-10 mx-2 rounded-xl">
    <h2 class=" mx-3 mt-3"> <span class="text-xl">PPID UTM</span> <span class="hidden md:inline">{{ $subTitle }}</span>
    </h2>
    <hr class="bg-black w-[98%] mx-auto h-[2px] mt-3">
    <div class="ml-4 h-full mb-12">
      {{ $slot }}
    </div>
  </div>
</div>
