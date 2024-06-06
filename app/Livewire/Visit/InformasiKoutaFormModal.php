<?php

namespace App\Livewire\Visit;

use App\Livewire\Forms\InformasiKoutaForm;
use App\Livewire\Module\BaseModal;
use App\Livewire\Module\Trait\Notification;
use App\Models\Faculty;
use App\Models\InformasiKouta;
use Livewire\Attributes\Computed;

class InformasiKoutaFormModal extends BaseModal
{
    use Notification;

    public InformasiKoutaForm $form;

    /*
     * normal modal title
     * @var string
     */
    protected static $title = "Add New Informasi Kouta";

    /*
     * load modal title
     * @var string
     */
    protected static $load_title = "Update Informasi Kouta";

    /*
     * save or load permission
     * @var string|bool
     */
    protected $permission = [
        'load' => 'informasi-kouta edit',
        'save' => 'informasi-kouta create'
    ];

    public function mount()
    {
        $this->clear();
    }

    public function render()
    {
        return view('pages.admin.visit.informasi-kouta.informasi-kouta-form-modal', [
            'faculties' => Faculty::all()
        ]);
    }

    #[Computed(persist: true)]
    public function informasiKouta()
    {
        return InformasiKouta::all();
    }

    public function load($id)
    {
        parent::load($id);
        $this->form->load($id);
    }

    public function save()
    {
        // check apakah data informasi kouta ditanggal yang sama dan nama kunjungan yang sama sudah ada atau tidak
        $isAvailable = InformasiKouta::where('faculty_id', '=', Faculty::getIdFacultyWithName($this->form->tujuan_kunjungan))
            ->where('tanggal_kunjungan', '=', $this->form->tanggal_kunjungan)->get()->first();


        if(!$isAvailable){
            parent::save();
            if($this->form->post()) {
                $this->dispatch('close-modal', name: $this->modal_name);
                $this->dispatch('informasi-kouta-table:reload');
                $this->toast(
                    message: $this->form->id == 0 ? 'Informasi Kouta Created' : 'Informasi Kouta Updated',
                    type: 'success'
                );
            }
        }else{
            dd($isAvailable);
        }
    }

    public function clear()
    {
        parent::clear();
        $this->form->clear();
    }
}
