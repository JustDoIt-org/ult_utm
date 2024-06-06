<x-section.card :$title :$search>
    <x-element.table :$cols :rows="$this->rows" :$sort_direction :$sort_by :$permissions :$modals />
    <livewire:visit.pengajuan-kunjungan-form-modal />
    <x-placeholder.offline-states />
    <x-placeholder.loading-states />
</x-section.card>
