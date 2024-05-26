<?php

namespace App\Livewire\Visit;

use App\Livewire\Module\BaseTable;
use App\Livewire\Module\Trait\Notification;
use App\Models\InformasiKouta;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Livewire\Component;

class InformasiKoutaTable extends BaseTable
{
    use Notification;

    #[Locked]
    public $title = "Informasi Kouta Table";

    protected array $permissions = [
        'create' => 'informasi-kouta create',
        'edit' => 'informasi-kouta edit',
        'delete' => 'informasi-kouta delete',
    ];

    protected array $modals = [
        'create' => 'informasi-kouta-form-modal',
        'edit' => 'informasi-kouta-form-modal',
    ];

    public function render()
    {
        return view('pages.visit.informasi-kouta.informasi-kouta-table', $this->getData());
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

    public function delete($id)
    {
        parent::delete($id);
        InformasiKouta::destroy($id);
        $this->toast(
            message: "Informasi Kouta Removed",
        );
    }
}
