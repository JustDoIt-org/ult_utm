<?php

namespace App\Livewire\Visit;

use App\Events\SendKodeKunjungan;
use App\Models\VisitAbsen;
use Illuminate\Http\Request;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Computed;
use App\Livewire\Module\BaseTable;
use App\Models\KodeKunjunganModel;
use App\Models\PengajuanKunjungan;
use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CekAbsensiTable extends BaseTable
{

    #[Locked]
    public $title = "Cek Absensi Table";
    public $kode_kunjungan;


    public function mount()
    {
        $kunjungan = KodeKunjunganModel::where('sudah', 0);

        $this->kode_kunjungan = KodeKunjunganModel::where('sudah', 0)->firstOrCreate(['created_at' => now()->today()], ['code' => KodeKunjunganModel::count() . rand(000000, 999999)])->latest()->get()[0];
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

    public function save()
    {
        $this->kode_kunjungan = KodeKunjunganModel::create(['code' => KodeKunjunganModel::count() . rand(000000, 999999)]);
    }


}
