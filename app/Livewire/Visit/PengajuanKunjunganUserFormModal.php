<?php

namespace App\Livewire\Visit;

use App\Livewire\Forms\PengajuanKunjunganForm;
use App\Livewire\Module\BaseModal;
use App\Livewire\Module\Trait\Notification;
use App\Models\PengajuanKunjungan;
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;

class PengajuanKunjunganUserFormModal extends BaseModal
{
    use Notification, WithFileUploads;

    public PengajuanKunjunganForm $form;

    /*
     * normal modal title
     * @var string
     */
    protected static $title = "Add New Pengajuan Kunjungan";

    /*
     * load modal title
     * @var string
     */
    protected static $load_title = "Update Pengajuan Kunjungan";

    /*
     * save or load permission
     * @var string|bool
     */
    protected $permission = [
        'load' => 'pengajuan-kunjungan-for-user edit',
        'save' => 'pengajuan-kunjungan-for-user create'
    ];

    public function mount()
    {
        $this->clear();
    }

    public function render()
    {
        return view('pages.visit.pengajuan-kunjungan.pengajuan-kunjungan-user-form-modal');
    }

    #[Computed(persist: true)]
    public function pengajuanKunjungan()
    {
        return PengajuanKunjungan::all();
    }

    public function load($id)
    {
        parent::load($id);
        $this->form->load($id);
    }

    public function save()
    {
        if($this->form->kapasitas_peserta <= $this->form->getSisaKouta()){
            // parent::save();
            // if($this->form->post()) {
            //     $this->dispatch('close-modal', name: $this->modal_name);
            //     $this->dispatch('pengajuan-kunjungan-user-table:reload');
            //     $this->toast(
            //         message: $this->form->id == 0 ? 'Pengajuan Kunjungan Created' : 'Pengajuan Kunjungan Updated',
            //         type: 'success'
            //     );
            // }
            $this->toast(
                message: $this->form->id == 0 ? 'Pengajuan Kunjungan Created' : 'Pengajuan Kunjungan Updated',
                type: 'success'
            );
        }else{
            $this->toast(
                message: 'Kapasitas peserta melebihi kouta',
                type: 'error'
            );
        }
    }

    public function clear()
    {
        parent::clear();
        $this->form->clear();
    }
}
