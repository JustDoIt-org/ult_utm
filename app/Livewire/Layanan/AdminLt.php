<?php

namespace App\Livewire\Layanan;

use App\Models\AdminLayananModel;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\LayananTerpadu;
use App\Models\JenisLayananModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminLt extends Component
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
            'tambah' => 'Tambah Admin Layanan',
            'edit' => 'Edit Admin Layanan',
            'delete' => 'Delete Admin Layanan',
        ];



        $users = [];
        $list_user = User::with(['roles' => function ($q) {
            $q->where('name', 'admin_ult');
        }])->get();

        // dd($list_user);

        foreach ($list_user as $key) {
            $row['id'] = $key->id;
            $row['name'] = $key->email;
            $users[] = $row;
        }


        $jenis = [];
        $jenis_layanan = JenisLayananModel::all();

        foreach ($jenis_layanan as $key) {
            $row['id'] = $key->id;
            $row['name'] = $key->type;
            $jenis[] = $row;
        }


        $nama_service = $jenis;


        $data = AdminLayananModel::all();
        $dataTables = [];
        foreach ($data as $key) {
            $row['id'] = $key->id;
            $row['user_id'] = $key->user->id;
            $row['name'] = $key->user->name;
            $row['email'] = $key->user->email;
            $row['jenis_layanan_id'] = $key->jenisLayanan->type;

            $dataTables[] = $row;
        }


        $delete_msg = 'Apakah kamu yakin ingin menghapus ini ?';

        $base_route = 'lt.atur_admin_layanan';

        $modal_field = [
            [
                'name' => 'jenis_layanan_id',
                'model' => 'jenis_layanan_id',
                'type' => 'select', 'options' => $nama_service, 'editSelected' => 'jenis_layanan_id'
            ],
            [
                'name' => 'user_id',
                'model' => 'user_id',
                'type' => 'select', 'options' => $users, 'editSelected' => 'email'
            ],
        ];


        $cols = ['Nama', 'Email', 'Jenis Layanan_id'];
        $rows = ['name', 'email', 'jenis_layanan_id'];

        $resource = true;
        $user = User::find(1);


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
