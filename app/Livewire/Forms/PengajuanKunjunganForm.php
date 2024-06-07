<?php

namespace App\Livewire\Forms;

use App\Models\Faculty;
use App\Models\InformasiKouta;
use App\Models\PengajuanKunjungan;
use Illuminate\Filesystem\FilesystemAdapter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class PengajuanKunjunganForm extends Form
{

    #[Locked]
    public $id;

    #[Validate('required')]
    public $tujuan_kegiatan;

    #[Validate('required')]
    public $tanggal_tersedia;

    #[Validate('required')]
    public $institusi_pengunjung;

    #[Validate('required')]
    public $provinsi_asal;

    #[Validate('required')]
    public $kota_asal;

    #[Validate('required')]
    public $nama_kegiatan;

    #[Validate('required|numeric')]
    public $kapasitas_peserta;

    public $jumlah_bus;

    #[Validate('required')]
    public $nama_pic;

    #[Validate('required')]
    public $kontak_pic;

    #[Validate('required')]
    public $progress = 'belum';

    public $surat_permohonan;

    public function load(int $id)
    {
        $pengajuan = PengajuanKunjungan::find($id);

        $this->id = $pengajuan->id;
        $this->tujuan_kegiatan = $pengajuan->informasiKouta->faculty->name;
        $this->tanggal_tersedia = $pengajuan->informasiKouta->tanggal_kunjungan;
        $this->institusi_pengunjung = $pengajuan->institusi_pengunjung;
        $this->provinsi_asal = $pengajuan->provinsi_asal;
        $this->kota_asal = $pengajuan->kota_asal;
        $this->nama_kegiatan = $pengajuan->nama_kegiatan;
        $this->kapasitas_peserta = $pengajuan->kapasitas_peserta;
        $this->jumlah_bus = $pengajuan->jumlah_bus;
        $this->nama_pic = $pengajuan->nama_pic;
        $this->kontak_pic = $pengajuan->kontak_pic;
        $this->progress = $pengajuan->progress;
        $this->surat_permohonan = $pengajuan->surat_permohonan;
    }

    public function clear()
    {
        $this->id = 0;
        $this->tujuan_kegiatan = null;
        $this->tanggal_tersedia = null;
        $this->institusi_pengunjung = '';
        $this->provinsi_asal = '';
        $this->kota_asal = '';
        $this->nama_kegiatan = '';
        $this->kapasitas_peserta = 0;
        $this->jumlah_bus = 0;
        $this->nama_pic = '';
        $this->kontak_pic = '';
        $this->progress = 'belum';
        $this->surat_permohonan = null;
    }

    public function post()
    {
        $this->validate();

        // Scope data informasi kouta
        $informasi_kouta = InformasiKouta::selectedInformasiKouta(
            Faculty::getIdFacultyWithName($this->tujuan_kegiatan),
            $this->tanggal_tersedia,
            $this->getSisaKouta()
        );

        $fileName = ($this->id != 0) ? $this->surat_permohonan : '/' .$this->surat_permohonan->store('surat_permohonan', 'public');
        $pengajuan = PengajuanKunjungan::find($this->id);

        if($this->id != 0) {
            // Ketika kondisi edit dan user mengubah file surat permohonan, file tersebut akan terhapus di folder storage
            if($this->surat_permohonan != $pengajuan->surat_permohonan){
                $fileName = '/' .$this->surat_permohonan->store('surat_permohonan', 'public');
                unlink(public_path('storage' . $pengajuan->surat_permohonan));
            }

            // Ketika value progress == selesai, maka nilai kouta di informasi kouta akan berkurang
            if($this->progress == 'selesai' && $pengajuan->progress != 'selesai'){
                $informasi_kouta->update(['sisa_kouta' => $informasi_kouta->sisa_kouta - $this->kapasitas_peserta]);
            }

            // Ketika value progress == selesai, dan diganti oleh admin menjadi belum atau diproses maka nilai kouta di informasi kouta akan bertambah
            if($pengajuan->progress == 'selesai' && $this->progress != 'selesai'){
                $informasi_kouta->update(['sisa_kouta' => $informasi_kouta->sisa_kouta + $this->kapasitas_peserta]);
            }
        }


        return PengajuanKunjungan::updateOrCreate(['id' => $this->id], [
            'user_id' =>($this->id == 0) ? Auth::id() : $pengajuan->user_id,
            'informasi_kouta_id' => $informasi_kouta->id,
            'institusi_pengunjung' => $this->institusi_pengunjung,
            'provinsi_asal' => $this->provinsi_asal,
            'kota_asal' => $this->kota_asal,
            'nama_kegiatan' => $this->nama_kegiatan,
            'kapasitas_peserta' => $this->kapasitas_peserta,
            'jumlah_bus' => $this->jumlah_bus,
            'nama_pic' => $this->nama_pic,
            'kontak_pic' => $this->kontak_pic,
            'surat_permohonan' => $fileName,
            'progress' => $this->progress
        ]);


    }

    public function generateKunjungan()
    {
        $tujuan_kunjungan = [];

        foreach (InformasiKouta::all() as $value) {
            $tujuan_kunjungan[] = $value->faculty->name;
        }

        return array_unique($tujuan_kunjungan);
    }

    public function generateTanggalTersedia()
    {
        $tanggal = [];
        $sisa_kouta = [];

        if($this->tujuan_kegiatan){
            $faculty_id = Faculty::getIdFacultyWithName($this->tujuan_kegiatan);
            $informasi_kouta = InformasiKouta::where("faculty_id", "=", $faculty_id)->get();

            foreach ($informasi_kouta as $value) {
                if($value['sisa_kouta'] > 0){
                    $tanggal[] = $value['tanggal_kunjungan'];
                    $sisa_kouta[] = $value['sisa_kouta'];
                }
            }
        }


        return [
            'tanggal_tersedia' => $tanggal,
            'sisa_kouta' => $sisa_kouta
        ];
    }

    public function getSisaKouta()
    {

        if($this->tujuan_kegiatan){
            foreach ($this->generateTanggalTersedia()['tanggal_tersedia'] as $key => $value) {
                if($this->tanggal_tersedia == $value) return $this->generateTanggalTersedia()['sisa_kouta'][$key];
            }
        }
    }
}
