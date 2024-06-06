<?php

namespace App\Livewire\Visit;

use App\Livewire\Module\BaseTable;
use App\Livewire\Module\Trait\Notification;
use App\Models\PengajuanKunjungan;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;

class PengajuanKunjunganTable extends BaseTable
{
    use Notification;

    #[Locked]
    public $title = "Pengajuan Kunjungan";

    protected array $permissions = [
        'create' => 'pengajuan-kunjungan create',
        'edit' => 'pengajuan-kunjungan edit',
        'delete' => 'pengajuan-kunjungan delete',
    ];

    protected array $modals = [
        'create' => 'pengajuan-kunjungan-form-modal',
        'edit' => 'pengajuan-kunjungan-form-modal',
    ];

    public function render()
    {
        return view('pages.admin.visit.pengajuan-kunjungan.pengajuan-kunjungan-table', $this->getData());
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
                "label" => "Email",
                "query" => "user.email",
                "sort" => true,
            ],
            [
                "label" => "Tanggal Kunjungan",
                "query" => "informasiKouta.tanggal_kunjungan",
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
                "query" => "informasiKouta.faculty.name",
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
            [
                "label" => "Keterangan",
                "query" => "progress",
                "sort" => true,
            ],
        ];
    }

    public function delete($id)
    {
        $doc = PengajuanKunjungan::find($id);

        unlink(public_path('storage' . $doc->surat_permohonan));
        parent::delete($id);
        PengajuanKunjungan::destroy($id);
        $this->toast(
            message: "Informasi Kouta Removed",
        );
    }
}
