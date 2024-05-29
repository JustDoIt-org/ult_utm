<?php

namespace App\Livewire\Ppid;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use App\Models\PpidAspirasiPengaduan;
use App\Livewire\Module\Trait\Notification;
use App\Models\StatusPpid;

class AspirasiPengaduanForm extends Component
{
    use Notification, WithFileUploads;

    public $profile;
    public $aspengaduan_button;
    public $nik;
    public $judul;
    public $uraian;
    public $saran;

    #[Validate('max:2048|mimes:png,jpg,jpeg')]
    public $photo;

    public function render()
    {
        $kategori_pemohon = ['Aspirasi', 'Pengaduan'];
        $this->cek_profile();
        $fields = [['NIK', 'nik'], ['Judul Aspirasi/Pengaduan', 'judul']];
        $text_area = [['Uraian Aspirasi/Pengaduan', 'uraian'], ['Saran', 'saran']];
        $data = ["kategori_pemohon" => $kategori_pemohon, "fields" => $fields, "text_area" => $text_area, 'profile' => $this->profile];
        return view('pages.ppid.aspirasi-pengaduan-form', $data);
    }

    private function cek_profile()
    {
        $cek_no_hp = auth()->user()->profile_information;
        if ($cek_no_hp[2]->value) {
            $this->profile = true;
        } else {
            $this->profile = false;
        }
    }

    public function save()
    {
        // $this->validate();
        $this->validate([
            "aspengaduan_button" => 'required',
            "judul" => 'required|min:5',
            "uraian" => 'required|min:10',
            "saran" => 'required|min:10',
            "nik" => 'required|numeric',
        ]);

        if ($this->photo) {
            $fileName = '/' . $this->photo->store('aspirasi_pengaduan', 'public');
        } else {
            $fileName = '';
        }

        $status = StatusPpid::create([
            'user_id' => Auth::id(),
            'progres' => 'belum',
            'uraian' => $this->uraian,
            'file' => $fileName,
            'type' => $this->aspengaduan_button,
        ]);

        $data = PpidAspirasiPengaduan::create(
            [
                'judul' => $this->judul,
                'status_ppid' => $status->id,
                'nik' => $this->nik,
                'saran' => $this->saran,
            ]
        );
        dd($data);


        $this->resetInput();

        return $this->toast(
            message: 'Berhasil',
            type: 'success'
        );
    }


    private function resetInput()
    {
        $this->aspengaduan_button = null;
        $this->nik = null;
        $this->judul = null;
        $this->uraian = null;
        $this->saran = null;
        $this->photo = null;
    }
}
