@if (Route::is('admin.informasi-kouta'))
    <x-section.card :$title :permission="$permissions['create']" :modal="$modals['create']" :$search>
        <x-element.table :$cols :rows="$this->rows" :$sort_direction :$sort_by :$permissions :$modals :$import :$export />

        <livewire:visit.informasi-kouta-form-modal />
        <x-placeholder.offline-states />
        <x-placeholder.loading-states />
    </x-section.card>
@else
    <x-section.card :$title :$search>
        <x-element.table :$cols :rows="$this->rows" :$sort_direction :$sort_by />
    </x-section.card>
@endif
