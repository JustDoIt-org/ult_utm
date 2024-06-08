<div x-data="{ activeTab: 0 }" class="ml-3 mt-3">
  <!-- Tab List -->
  <ul role="tablist" class="flex mb-3 ml-8">
    @php
      $arr = ['Belom Diproses', 'Diproses', 'Selesai'];
    @endphp
    @foreach ($arr as $i)
      <li>
        <button @click="activeTab = {{ $loop->index }}" :aria-selected="activeTab === {{ $loop->index }}"
          :class="{ 'bg-white': activeTab === {{ $loop->index }} }" class="px-3 py-2 rounded-lg" role="tab">
          <!-- Icon and Title for Tab 1 -->
          <span>{{ $i }}</span>
        </button>
      </li>
    @endforeach
  </ul>


  <!-- Panels -->
  <div role="tabpanels">
    @foreach ($arr as $i)
      <section x-show="activeTab === {{ $loop->index }}" role="tabpanel">
        @switch($loop->index)
          @case(0)
            <livewire:ppid-admin.request-table />
          @break

          @case(1)
            <p>Hekki world</p>
          @break

          @case(2)
            <p>Tigaa</p>
          @break

          @default
        @endswitch


      </section>
    @endforeach
  </div>
</div>
