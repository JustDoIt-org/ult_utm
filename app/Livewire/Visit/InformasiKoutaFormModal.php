<?php

namespace App\Livewire\Visit;

use App\Livewire\Forms\InformasiKoutaForm;
use App\Livewire\Module\BaseModal;
use App\Livewire\Module\Trait\Notification;
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
        return view('pages.visit.informasi-kouta.informasi-kouta-form-modal');
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
        parent::save();
        if($this->form->post()) {
            $this->dispatch('close-modal', name: $this->modal_name);
            $this->dispatch('informasi-kouta-table:reload');
            $this->toast(
                message: $this->form->id == 0 ? 'Informasi Kouta Created' : 'Informasi Kouta Updated',
                type: 'success'
            );
        }
    }

    public function clear()
    {
        parent::clear();
        $this->form->clear();
    }
}
