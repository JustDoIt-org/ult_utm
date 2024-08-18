<?php

namespace App\Livewire\PpidAdmin\Request;

use App\Models\RequestPpid;
use Livewire\WithFileUploads;
use App\Livewire\Forms\PpidForm;
use Livewire\Attributes\Computed;
use App\Livewire\Module\BaseModal;
use App\Livewire\Module\Trait\Notification;

class RequestFormModal extends BaseModal
{
    use Notification, WithFileUploads;

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
    // public function RequestPpid()
    // {
    //     return RequestPpid::where('status.progress', "like", "belum")->all();
    // }

    public function load($id)
    {
        parent::load($id);
        $this->form->load($id);
    }

    public function save()
    {
        parent::save();
        if ($this->form->post()) {
            $this->dispatch('close-modal', name: $this->modal_name);
            $this->dispatch('request-table:reload');
            $this->toast(
                message: $this->form->id == 0 ? 'Request PPID Created' : 'Request PPID Updated',
                type: 'success'
            );
        } else {
            return $this->toast(
                message: "Maaf, Ada kesalahan",
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
