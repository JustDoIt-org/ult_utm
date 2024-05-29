<?php

namespace App\Livewire\Ppid;

use Livewire\Component;
use App\Models\StatusPpid;
use Livewire\WithFileUploads;
use App\Livewire\Ppid\BasePpid;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Module\Trait\Notification;
use App\Models\RequestPpid;

class RequestForm extends Component
{
    use Notification, WithFileUploads;

    public BasePpid $base;

    public function render()
    {

        return view('pages.ppid.request-form', $this->base->RequestFormStatic());
    }

    public function store()
    {
        $this->base->validate_form();
        $this->base->post_request();
        $this->base->resetInput();

        return $this->toast(
            message: 'Berhasil',
            type: 'success'
        );
    }
}
