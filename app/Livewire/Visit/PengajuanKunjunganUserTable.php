<?php

namespace App\Livewire\Visit;

use App\Livewire\Module\BaseTable;
use App\Livewire\Module\Trait\Notification;
use App\Models\PengajuanKunjungan;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;

class PengajuanKunjunganUserTable extends BaseTable
{
    use Notification;

    #[Locked]
    public $title = "Pengajuan Kunjungan User";

    protected array $permissions = [
        'create' => 'pengajuan-kunjungan-for-user create',
        'edit' => 'pengajuan-kunjungan-for-user edit',
        'delete' => 'pengajuan-kunjungan-for-user delete',
    ];

    protected array $modals = [
        'create' => 'pengajuan-kunjungan-user-form-modal',
        'edit' => 'pengajuan-kunjungan-user-form-modal',
    ];

    public function render()
    {
        return view('pages.visit.pengajuan-kunjungan.pengajuan-kunjungan-user-table', $this->getData());
    }

    #[Computed]
    public function rows()
    {
        return PengajuanKunjungan::search($this->search)
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->perPage);
    }

    public function cols()
    {
        return [
            [
                "label" => "Tanggal Kunjungan",
                "query" => "tanggal_tersedia",
                "sort" => true,
            ],
            [
                "label" => "Asal Institusi",
                "query" => "institusi_pengunjung",
                "sort" => false,
            ],
            [
                "label" => "Nama Kegiatan",
                "query" => "nama_kegiatan",
                "sort" => true,
            ],
            [
                "label" => "Tujuan Kegiatan",
                "query" => "tujuan_kegiatan",
                "sort" => true,
            ],
            [
                "label" => "Nama PIC",
                "query" => "nama_pic",
                "sort" => true,
            ],
            [
                "label" => "Kapasitas Ajuan",
                "query" => "kapasitas_peserta",
                "sort" => true,
            ],
        ];
    }

    public function delete($id)
    {
        parent::delete($id);
        PengajuanKunjungan::destroy($id);
        $this->toast(
            message: "Informasi Kouta Removed",
        );
    }
}
