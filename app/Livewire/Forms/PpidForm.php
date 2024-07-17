<?php

namespace App\Livewire\Forms;

use App\Models\RequestPpid;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Form;

class PpidForm extends Form
{
    #[Locked]
    public $id;

    #[Validate('required')]
    public $alamat;

    #[Validate('required')]
    public $pekerjaan;

    #[Validate('required')]
    public $kategori_pemohon;

    #[Validate('required')]
    public $rincian_informasi;

    #[Validate('required')]
    public $tujuan_penggunaan;

    #[Validate('required')]
    public $memperoleh_informasi;

    public $memperoleh_salinan;

    public $progress;

    public function load(int $id)
    {
        $ik = RequestPpid::find($id);
        $this->progress = $ik->status->progress;
        $this->id = $ik->id;
        $this->alamat = $ik->alamat;
        $this->pekerjaan = $ik->pekerjaan;
        $this->kategori_pemohon = $ik->kategori_pemohon;
        $this->rincian_informasi = $ik->rincian_informasi;
        $this->tujuan_penggunaan = $ik->tujuan_penggunaan;
        $this->memperoleh_informasi = $ik->memperoleh_informasi;
        $this->memperoleh_salinan = $ik->memperoleh_salinan;
    }

    public function clear()
    {
        $this->id = 0;
        $this->alamat = null;
        $this->pekerjaan = null;
        $this->kategori_pemohon = null;
        $this->rincian_informasi = null;
        $this->tujuan_penggunaan = null;
        $this->memperoleh_informasi = null;
        $this->memperoleh_salinan = null;
    }

    public function post()
    {
        $this->validate();

        switch ($this->progress) {
            case 'belum':
                $this->progress = 1;
                break;
            case 'diproses':
                $this->progress = 2;
                break;
            default:
                $this->progress = 3;
                break;
        }

        return RequestPpid::updateOrCreate(['id' => $this->id], [
            'id' => $this->id,
            'status_ppid' => $this->progress
        ]);
    }
}
