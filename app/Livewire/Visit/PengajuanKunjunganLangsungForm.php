<?php

namespace App\Livewire\Visit;

use App\Livewire\Forms\PengajuanKunjunganForm;
use App\Livewire\Module\Trait\Notification;
use Livewire\Component;

class PengajuanKunjunganLangsungForm extends Component
{
    use Notification;
    public PengajuanKunjunganForm $form;

    public function render()
    {
        return view('livewire.visit.pengajuan-kunjungan-langsung-form');
    }

    public function save()
    {
        if($this->form->kapasitas_peserta <= $this->form->getSisaKouta()){
            if($this->form->post()) {
                $this->dispatch('pengajuan-kunjungan-user-table:reload');
                $this->dispatch('pengajuan-kunjungan-table:reload');
                $this->toast(
                    message: $this->form->id == 0 ? 'Pengajuan Kunjungan Created' : 'Pengajuan Kunjungan Updated',
                    type: 'success'
                );
                $this->form->clear();
            }
        }else{
            $this->toast(
                message: 'Kapasitas peserta melebihi kouta',
                type: 'error'
            );
        }
    }
}
