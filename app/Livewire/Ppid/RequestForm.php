<?php

namespace App\Livewire\Ppid;

use Livewire\Component;
use App\Models\StatusPpid;
use Livewire\WithFileUploads;
use App\Livewire\Ppid\BasePpid;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Module\Trait\Notification;
use App\Mail\PpidMail;
use App\Models\RequestPpid;
use Illuminate\Support\Facades\Mail;

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
        $data = $this->base->post_request();
        $this->base->resetInput();

        // request()->session()->flash('data', $data->slug);
        Mail::to(Auth::user()->email)->send(new PpidMail($data->slug, "Kode Pengajuan"));

        return $this->toast(
            message: 'Berhasil',
            type: 'success'
        );
    }
}
