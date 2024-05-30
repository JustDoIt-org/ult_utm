<?php

namespace App\Livewire\Faculty;

use App\Livewire\Forms\FacultyForm;
use App\Livewire\Module\BaseModal;
use App\Livewire\Module\Trait\Notification;
use App\Models\Faculty;
use Livewire\Attributes\Computed;

class FacultyFormModal extends BaseModal
{
    use Notification;

    public FacultyForm $form;

    /*
     * normal modal title
     * @var string
     */
    protected static $title = "Add New Faculty";

    /*
     * load modal title
     * @var string
     */
    protected static $load_title = "Update Faculty";

    /*
     * save or load permission
     * @var string|bool
     */
    protected $permission = [
        'load' => 'faculty edit',
        'save' => 'faculty create'
    ];

    public function mount()
    {
        $this->clear();
    }

    public function render()
    {
        return view('pages.admin.faculty.faculty-form-modal');
    }

    #[Computed(persist: true)]
    public function faculties()
    {
        return Faculty::all();
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
            $this->dispatch('faculties-table:reload');
            $this->toast(
                message: $this->form->id == 0 ? 'Faculty Created' : 'Faculty Updated',
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
