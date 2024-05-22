<?php

namespace App\Livewire\Ppid;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Module\Trait\Notification;

class RequestForm extends Component
{
    use Notification;

    public $field_search;
    public $kategori_pemohon;
    public $kategori_pemohon_field;

    public function render()
    {
        $pemohon = ['Perorangan', 'Pemerintah', 'Instansi Swasta', 'Organisasi Lainnya'];
        $fields = [['Alamat', 'alamat'], ['Pekerjaan', 'pekerjaan']];
        $text_area = ['Judul Aspirasi/Pengaduan', 'Saran'];
        $data = ["pemohon" => $pemohon, "fields" => $fields, "text_area" => $text_area];
        return view('pages.ppid.request-form', $data);
    }

    public function store()
    {
        $fields = $this->kategori_pemohon . ' ' . $this->kategori_pemohon_field;
        dd($fields);
        $id = Auth::id();
        $this->validate([
            "field_search" => 'required|min:3',
        ]);


        $this->resetInput();
    }


    private function resetInput()
    {
        $this->field_search = null;
    }
}
