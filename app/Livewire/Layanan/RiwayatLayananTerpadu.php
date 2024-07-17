<?php

namespace App\Livewire\Layanan;

use App\Models\LayananTerpadu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RiwayatLayananTerpadu extends Component
{
    public function render()
    {

        $btn_link = false;
        $modal_title = [
            // 'tambah' => 'Tambah FAQ',
            // 'edit' => 'Edit FAQ',
            // 'delete' => 'Delete FAQ',
        ];
        $delete_msg = 'Are You sure Want To Delete This FAQ ?';
        $modal_field = [
            [
                'name' => 'service',
            ],
            ['name' => 'answer']
        ];
        $cols = ['Layanan', 'date', 'NIM/NIDN/KTP'];
        $rows = ['service', 'date', 'nim'];
        $dataTables = LayananTerpadu::where('user_id', Auth::id())->get();

        $data = [
            'title' => 'FAQ Page',
            'cols' => $cols,
            'rows' => $rows,
            'dataTables' => $dataTables,
            'modal_title' => $modal_title,
            'modal_field' => $modal_field,
            'btn_link' => $btn_link,
            'delete_msg' => $delete_msg,
        ];
        return view('livewire.riwayat-layanan-terpadu', $data);
    }
}
