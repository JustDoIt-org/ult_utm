<?php

namespace App\Livewire\Faq;

use App\Livewire\Forms\FaqForm;
use App\Livewire\Module\BaseModal;
use App\Livewire\Module\Trait\Notification;
use App\Models\Faq;
use Livewire\Attributes\Computed;

class FaqFormModal extends BaseModal
{
    use Notification;

    public FaqForm $form;

    /*
     * normal modal title
     * @var string
     */
    protected static $title = "Add New Faq";

    /*
     * load modal title
     * @var string
     */
    protected static $load_title = "Update Faq";

    /*
     * save or load permission
     * @var string|bool
     */
    protected $permission = [
        'load' => 'faq edit',
        'save' => 'faq create'
    ];

    public function mount()
    {
        $this->clear();
    }

    public function render()
    {
        return view('pages.faq.faq-form-modal');
    }

    #[Computed(persist: true)]
    public function faqs()
    {
        return Faq::all();
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
            $this->dispatch('faq-table:reload');
            $this->toast(
                message: $this->form->id == 0 ? 'Faq Created' : 'Faq Updated',
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
