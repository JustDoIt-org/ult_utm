<?php

namespace App\Livewire\Ppid;

use Livewire\Form;
use App\Models\StatusPpid;
use App\Models\RequestPpid;
use Illuminate\Support\Facades\Auth;

class BasePpid extends Form
{
    public $alamat;
    public $pekerjaan;
    public $uraian_laporan;
    public $tujuan_penggunaan;
    public $kategori_pemohon;
    public $kategori_pemohon_textfield;
    public $rincian_informasi;
    public $rincian_informasi_textfield;
    public $ktp;
    public $get_informasi;
    public $cara_salinan;
    public $cara_salinan_textfield;

    function RequestFormStatic()
    {
        $pemohon = [['Perorangan', ''], ['Pemerintah', 'input_text'], ['Instansi Swasta', 'input_text'], ['Organisasi Lainnya', 'input_text']];
        $rincian = [['Penerimaan Mahasiswa Baru', ''], ['Informasi Umum', ''], ['Permintaan Data', 'text_with_upload_file']];
        $fields = [['Alamat', 'base.alamat'], ['Pekerjaan', 'base.pekerjaan']];
        $text_area = [['Uraian Laporan', 'base.uraian_laporan'], ['Tujuan Penggunaan Informasi', 'base.tujuan_penggunaan']];
        $cara_informasi = [['Melihat/membaca/mendengarkan/mencatat', ''], ['Mendapatkan salinan (hardcopy/softcopy)', ''], ['Video Converence(Whatsapp)', ''], ['Video Converence(zoom)', ''], ['Video Converence(Google meet)', '']];
        $salinan = [['Mengambil Langsung', ''], ['Kurir', ''], ['Pos', ''], ['Faksimili', 'input_text'], ['Email', '']];
        $data = ["pemohon" => $pemohon, "fields" => $fields, "text_area" => $text_area, 'rincian' => $rincian, 'cara_informasi' => $cara_informasi, 'salinan' => $salinan];
        return $data;
    }


    public function resetInput()
    {
        $this->alamat = null;
        $this->pekerjaan = null;
        $this->uraian_laporan = null;
        $this->tujuan_penggunaan = null;
        $this->kategori_pemohon = null;
        $this->kategori_pemohon_textfield = null;
        $this->rincian_informasi = null;
        $this->rincian_informasi_textfield = null;
        $this->ktp = null;
        $this->get_informasi = null;
        $this->cara_salinan = null;
        $this->cara_salinan_textfield = null;
    }


    function validate_form()
    {
        $this->validate([
            "alamat" => 'required',
            "pekerjaan" => 'required',
            "kategori_pemohon" => 'required',
            "rincian_informasi" => 'required',
            "uraian_laporan" => 'required',
            "tujuan_penggunaan" => 'required',
            "get_informasi" => 'required',
        ]);



        if ($this->kategori_pemohon !== 'Perorangan') {
            $this->validate([
                "kategori_pemohon_textfield" => 'required',
            ]);
        }

        if ($this->rincian_informasi === 'Permintaan Data') {
            $this->validate([
                "rincian_informasi_textfield" => 'required',
                "ktp" => 'required',
            ]);
        }

        if ($this->cara_salinan === 'Faksimili') {
            $this->validate([
                "cara_salinan_textfield" => 'required',
            ]);
        }

        if ($this->get_informasi === 'Mendapatkan salinan (hardcopy/softcopy)') {
            $this->validate([
                "cara_salinan" => 'required',
            ]);
        }
    }


    function post_request()
    {
        if ($this->ktp) {
            $fileName = '/' . $this->ktp->store('request', 'public');
        } else {
            $fileName = '';
        }

        $status = StatusPpid::create([
            'user_id' => Auth::id(),
            'progres' => 'belum',
            'uraian' => $this->uraian_laporan,
            'file' => $fileName,
            'type' => 'request',
        ]);

        $this->kategori_pemohon = $this->kategori_pemohon . ' ' . $this->kategori_pemohon_textfield;
        $this->rincian_informasi = $this->rincian_informasi . ' ' . $this->rincian_informasi_textfield;
        $this->cara_salinan = $this->cara_salinan . ' ' . $this->cara_salinan_textfield;

        $data = RequestPpid::create(
            [
                'status_ppid' => $status->id,
                'alamat' => $this->alamat,
                'pekerjaan' => $this->pekerjaan,
                'kategori_pemohon' => $this->kategori_pemohon,
                'rincian_informasi' => $this->rincian_informasi,
                'tujuan_penggunaan' => $this->tujuan_penggunaan,
                'memperoleh_informasi' => $this->get_informasi,
                'memperoleh_salinan' => $this->cara_salinan,
            ]
        );

        return $data;
    }
}
