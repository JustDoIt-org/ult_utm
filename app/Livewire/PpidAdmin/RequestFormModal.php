<?php

namespace App\Livewire\PpidAdmin;

use App\Livewire\Forms\PpidForm;
use App\Livewire\Module\BaseModal;
use App\Livewire\Module\Trait\Notification;
use App\Models\RequestPpid;
use Livewire\Attributes\Computed;

class RequestFormModal extends BaseModal
{
    use Notification;

    public PpidForm $form;

    /*
     * normal modal title
     * @var string
     */
    protected static $title = "Add New Request PPID";

    /*
     * load modal title
     * @var string
     */
    protected static $load_title = "Update Request PPID";

    /*
     * save or load permission
     * @var string|bool
     */
    protected $permission = [
        'load' => 'request edit',
        'save' => 'request create'
    ];

    public function mount()
    {
        $this->clear();
    }

    public function render()
    {
        return view('pages.admin.ppid.ppid-form-modal');
    }

    #[Computed(persist: true)]
    public function RequestPpid()
    {
        return RequestPpid::all();
    }

    public function load($id)
    {
        dd('loads');
        parent::load($id);
        $this->form->load($id);
    }

    public function save()
    {

        dd('save');
        // if ($this->form->tujuan_kunjungan) {
        //     // check apakah data informasi kouta ditanggal yang sama dan nama kunjungan yang sama sudah ada atau tidak
        //     $isAvailable = InformasiKouta::where('faculty_id', '=', Faculty::getIdFacultyWithName($this->form->tujuan_kunjungan))
        //         ->where('tanggal_kunjungan', '=', $this->form->tanggal_kunjungan)->get()->first();


        //     if ($isAvailable && $this->form->id == 0) {
        //         return $this->toast(
        //             message: "Maaf, fakultas kunjugan di tanggal tersebut telah tersedia.",
        //             type: 'error'
        //         );
        //     }

        //     parent::save();
        //     if ($this->form->post()) {
        //         $this->dispatch('close-modal', name: $this->modal_name);
        //         $this->dispatch('informasi-kouta-table:reload');
        //         $this->toast(
        //             message: $this->form->id == 0 ? 'Informasi Kouta Created' : 'Informasi Kouta Updated',
        //             type: 'success'
        //         );
        //     }
        // } else {
        //     return $this->toast(
        //         message: "Maaf, tolong untuk mengisi fakultas kunjungan.",
        //         type: 'error'
        //     );
        // }
    }

    public function clear()
    {
        parent::clear();
        $this->form->clear();
    }
}
