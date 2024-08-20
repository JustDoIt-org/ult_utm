<?php

namespace App\Livewire\Visit;

use Livewire\Component;
use App\Models\KodeKunjunganModel;
use App\Livewire\Module\Trait\Notification;
use App\Livewire\Forms\PengajuanKunjunganForm;

class PengajuanKunjunganLangsungForm extends Component
{
    use Notification;
    public PengajuanKunjunganForm $form;

    public $kode_kunjungan;

    public function render()
    {
        return view('livewire.visit.pengajuan-kunjungan-langsung-form');
    }

    public function save()
    {
        $kode_kunjungan = KodeKunjunganModel::whereDay('created_at', now()->day)->get();


        if (isset($kode_kunjungan) && $kode_kunjungan[0]->code == $this->kode_kunjungan) {
            if ($this->form->kapasitas_peserta <= $this->form->getSisaKouta()) {
                if ($this->form->post()) {
                    // $this->dispatch('pengajuan-kunjungan-user-table:reload');
                    // $this->dispatch('pengajuan-kunjungan-table:reload');
                    $this->toast(
                        message: $this->form->id == 0 ? 'Pengajuan Kunjungan Created' : 'Pengajuan Kunjungan Updated',
                        type: 'success'
                    );
                    $this->form->clear();
                }
            } else {
                $this->toast(
                    message: 'Kapasitas peserta melebihi kouta',
                    type: 'error'
                );
            }
        } else {
            $this->kode_kunjungan = null;
            return $this->toast(
                message: 'Maaf code kunjungan salah, harap tanyakan kode yang benar ke petugas',
                type: 'error'
            );
        }
    }
}
