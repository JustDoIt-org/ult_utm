<div x-data="{ activeTab: 0 }" class="ml-3 mt-3">
  <!-- Tab List -->
  <ul role="tablist" class="flex mb-3">
    @php
      $arr = ['My Account', 'Billing'];
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
      <!-- Panel 1 -->
      <section x-show="activeTab === {{ $loop->index }}" role="tabpanel">
        <!-- Content for Panel 1 -->
        <p>Tab panel {{ $loop->index + 1 }}</p>
      </section>
    @endforeach
  </div>
</div>
