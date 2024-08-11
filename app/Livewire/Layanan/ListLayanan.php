<?php

namespace App\Livewire\Layanan;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\LayananTerpadu;
use App\Models\JenisLayananModel;
use Illuminate\Support\Facades\Auth;

class ListLayanan extends Component
{
    public $type = '';
    public $id_pengajuan;
    public $service;
    public $file_balasan;
    public $nim;
    public $desc;



    public function render()
    {

        $modal_title = [
            'tambah' => 'Tambah Jenis Layanan',
            'edit' => 'Edit Jenis Layanan',
            'delete' => 'Delete Jenis Layanan',
        ];
        $dataTables = JenisLayananModel::all();
        $delete_msg = 'Apakah kamu yakin ingin menghapus pengaduan ini ?';


        $base_route = 'lt.list_layanan';

        $modal_field = [
            [
                'name' => 'type',
                'model' => 'type',
            ],
        ];


        $cols = ['Nama Layanan'];
        $rows = ['type'];

        $resource = true;

        $data = [
            'title' => 'Daftar Pengajuan',
            'cols' => $cols,
            'rows' => $rows,
            'dataTables' => $dataTables,
            'modal_title' => $modal_title,
            'modal_field' => $modal_field,
            'btn_link' => false,
            'base_route' => $base_route,
            'resource' => $resource,
            'delete_msg' => $delete_msg,
        ];
        return view('livewire.table', $data);
    }

    public function diteruskan()
    {
        dd($this->service);
    }
}
