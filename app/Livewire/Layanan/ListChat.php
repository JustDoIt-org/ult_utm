<?php

namespace App\Livewire\Layanan;

use Livewire\Component;
use App\Models\LayananTerpadu;
use App\Models\DiscussionModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ListChat extends Component
{
    public $type = '';
    public $id_pengajuan;
    public function render()
    {
        $btn_link = '/terpadu/chat_admin_to_guest';
        $btn_link_name = 'Chat';
        $modal_title = [
            // 'tambah' => 'Tambah discussion',
            'edit' => 'Edit discussion',
            'delete' => 'Delete discussion',
        ];
        $delete_msg = 'Are You sure Want To Delete This discussion ?';
        $modal_field = [
            // [
            //     'name' => 'user_id', 'type' => 'select', 'options' => $this->users->where('role', 'guest')->findAll()
            // ],
            // ['name' => 'title']
        ];
        $cols = ['username', 'email'];
        $rows = ['name', 'email'];

        $activeUsers = DB::table('discussion')->select('user_id')->where('tujuan', 'layanan');
        $array = DB::table('users')->select("*")->whereIn('id', $activeUsers)->get();
        $dataTables = json_decode(json_encode($array), true);
        // dd($array[0]['name']);
        $data = [
            'title' => 'discussion Page',
            'cols' => $cols,
            'rows' => $rows,
            'dataTables' => $dataTables,
            'modal_title' => $modal_title,
            'modal_field' => $modal_field,
            'btn_link' => $btn_link,
            'delete_msg' => $delete_msg,
            'btn_link_name' => $btn_link_name,

        ];
        return view('livewire.table', $data);
    }

    public function destroy()
    {
        dd($this->id_pengajuan);
    }
}
