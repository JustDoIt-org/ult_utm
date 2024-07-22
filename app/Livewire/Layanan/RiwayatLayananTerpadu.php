<?php

namespace App\Livewire\Layanan;

use App\Models\LayananTerpadu;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RiwayatLayananTerpadu extends Component
{
    public $type = '';
    public $id_pengajuan;
    public function render()
    {

        $btn_link = false;
        
        switch ($this->type) {
            case 'list':
                $modal_title = [
                    // 'tambah' => 'Tambah FAQ',
                    // 'edit' => 'Edit Pengajuan',
                    // 'delete' => 'Delete Pengajuan',
                ];
                $dataTables = LayananTerpadu::where('user_id', Auth::id())->where('progress', '!=', 'selesai')->get();
                break;
            case 'admin_list':
                $modal_title = [
                    'tambah' => 'link',
                    'edit' => 'Edit Pengajuan',
                    'delete' => 'Delete Pengajuan',
                ];
                $dataTables = LayananTerpadu::where('progress', '!=', 'selesai')->get();
                break;
            case 'admin_riwayat':
                $modal_title = [
                    // 'tambah' => 'link',
                    'edit' => 'Edit Pengajuan',
                    'delete' => 'Delete Pengajuan',
                ];
                $dataTables = LayananTerpadu::where('progress', '==', 'selesai')->get();
                break;

            default:
                $modal_title = [];
                $dataTables = LayananTerpadu::where('user_id', Auth::id())->where('progress', 'selesai')->get();
                break;
        }
        $delete_msg = 'Apakah kamu yakin ingin menghapus pengaduan ini ?';
        $nama_service = [
            'Layanan Akademik',
            'Layanan Kemahasiswaan',
            'Layanan Keuangan',
            'Layanan Umum',
            'Layanan Kerjasama',
            'Layanan Kunjungan Sekolah',
            'Lainnya',
        ];
        $modal_field = [
            [
                'name' => 'service', 'type' => 'select', 'options' => $nama_service
            ],
            [
                'name' => 'nim'
            ],
            [
                'name' => 'desc'
            ],
        ];
        $cols = ['Service', 'date', 'NIM/NIDN/KTP', 'Institution', 'desc', 'Status'];
        $rows = ['service', 'date', 'nim', 'institusi', 'desc', 'progress'];

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
        return view('livewire.table', $data);
    }

    public function destroy()
    {
        dd($this->id_pengajuan);
    }
}
