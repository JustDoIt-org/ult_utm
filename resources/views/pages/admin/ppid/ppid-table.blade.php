<x-section.card :$title :permission="$permissions['create']" :modal="$modals['create']" :$search>
  <x-element.table :$cols :rows="$this->rows" :$sort_direction :$sort_by :$permissions :$modals :$import :$export />
  @isset($c)
    <livewire:ppid-admin.aspirasi.aspirasi-form-modal />
  @else
    <livewire:ppid-admin.request.request-form-modal />
  @endisset
  {{-- @dd('request'); --}}
  <x-placeholder.offline-states />
  <x-placeholder.loading-states />
</x-section.card>
