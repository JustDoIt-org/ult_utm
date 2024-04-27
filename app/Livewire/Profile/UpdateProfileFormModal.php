<?php

namespace App\Livewire\Profile;

use App\Livewire\Module\BaseModal;

class UpdateProfileFormModal extends BaseModal
{
    /*
     * normal modal title
     * @var string
     */
    protected static $title = "";

    /*
     * load modal title
     * @var string
     */
    protected static $load_title = "";

    /*
     * save or load permission
     * @var string|bool
     */
    protected $permission = [
        'load' => false,
        'save' => false
    ];

    public function mount()
    {
        $this->clear();
    }

    public function render()
    {
        return view("livewire.profile.update-profile-form-modal");
    }

    public function load($id)
    {
        parent::load($id);
    }

    public function save()
    {
        parent::save();
    }

    public function clear()
    {
        parent::clear();
    }
}
