<?php

namespace App\Livewire\Ppid;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\PpidAspirasiPengaduan;
use App\Livewire\Module\Trait\Notification;

class KeberatanForm extends Component
{
    use Notification;

    public $field_search;
    public $data_found;


    public function render()
    {
        $desc = 'Silakan ajukan keberatan saudara apabila permohonan informasi belum terlayani selama 10 hari kerja atau jawaban atas permohonan informasi tidak sesuai dengan memasukkan nomor permohonan yang bersangkutan.';
        $data = ['desc' => $desc];
        return view('pages.ppid.keberatan-form', $data);
    }

    public function send()
    {
        $this->validate([
            "field_search" => 'required|min:3',
        ]);

        $data = PpidAspirasiPengaduan::find($this->field_search);
        if ($data) {
            $this->data_found = $data;
        } else {
            session()->flash('message', 'Data Not Found');
            $this->data_found = false;
        }

        // $this->resetInput();
    }


    private function resetInput()
    {
        $this->field_search = null;
    }
}
