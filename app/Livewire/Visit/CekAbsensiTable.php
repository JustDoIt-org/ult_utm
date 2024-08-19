<?php

namespace App\Livewire\Visit;

use App\Models\VisitAbsen;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Computed;
use App\Livewire\Module\BaseTable;
use App\Models\KodeKunjunganModel;
use App\Models\PengajuanKunjungan;

class CekAbsensiTable extends BaseTable
{

    #[Locked]
    public $title = "Cek Absensi Table";
    public $kode_kunjungan;

    public function mount()
    {
        $this->kode_kunjungan = KodeKunjunganModel::firstOrCreate(['created_at' => now()->today()], ['code' => KodeKunjunganModel::count() . rand(000000, 999999)])->get();
    }

    public function render()
    {
        return view('livewire.visit.cek-absensi-table', $this->getData());
    }

    #[Computed]
    public function rows()
    {
        return VisitAbsen::search($this->search)
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->perPage);
    }

    public function cols()
    {
        return [
            [
                "label" => "Nama PIC",
                "query" => "pengajuan.nama_pic",
                "sort" => false,
            ],
            [
                "label" => "Code",
                "query" => "code_absen",
                "sort" => true,
            ],
            [
                "label" => "Kapasitas Ajuan",
                "query" => "pengajuan.kapasitas_peserta",
                "sort" => false,
            ],
            [
                "label" => "Status Absensi",
                "query" => "absen",
                "sort" => true,
            ],
        ];
    }
}
