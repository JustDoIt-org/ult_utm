<?php

namespace App\Livewire\Visit;

use App\Livewire\Module\BaseTable;
use App\Livewire\Module\Trait\Notification;
use App\Models\InformasiKouta;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;

class InformasiKoutaTableView extends BaseTable
{
    use Notification;

    #[Locked]
    public $title = "Informasi Kouta Table";

    public function render()
    {
        $this->dispatch('calendarRefresh');
        return view('pages.visit.informasi-kouta.informasi-kouta-table-view', $this->getData());
    }

    #[Computed]
    public function rows()
    {
        return InformasiKouta::search($this->search)
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->perPage);
    }

    public function cols()
    {
        return [
            [
                "label" => "Tanggal Kunjungan",
                "query" => "tanggal_kunjungan",
                "sort" => true,
            ],
            [
                "label" => "Sisa Kouta",
                "query" => "sisa_kouta",
                "sort" => true,
            ],
            [
                "label" => "Tujuan Kunjungan",
                "query" => "tujuan_kunjungan",
                "sort" => true,
            ],
        ];
    }
}
