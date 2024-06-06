<?php

namespace App\Livewire\Visit;

use App\Livewire\Module\BaseTable;
use App\Livewire\Module\Trait\Notification;
use App\Models\PengajuanKunjungan;
use Illuminate\Support\Facades\Auth;
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
        return PengajuanKunjungan::where('user_id', 'like', Auth::id())
            // ->search($this->search)
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
