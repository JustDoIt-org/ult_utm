<x-section.card :$title :permission="$permissions['create']" :modal="$modals['create']" :$search>
    <x-element.table :$cols :rows="$this->rows" :$sort_direction :$sort_by :$modals />

    <livewire:visit.pengajuan-kunjungan-user-form-modal />
    <x-placeholder.offline-states />
    <x-placeholder.loading-states />
</x-section.card>
