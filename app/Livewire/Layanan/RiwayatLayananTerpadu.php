<?php

namespace App\Livewire\Layanan;

use App\Models\AdminLayananModel;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\LayananTerpadu;
use App\Models\JenisLayananModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Can;

class RiwayatLayananTerpadu extends Component
{
    public $type = '';
    public $id_pengajuan;
    public $service;
    public $file_balasan;
    public $nim;
    public $desc;



    public function render()
    {

        $rules = [
            'service' => 'required'
        ];

        $jenis = [];
        $jenis_layanan = JenisLayananModel::select('type')->get();

        foreach ($jenis_layanan as $key) {
            $jenis[] = $key->type;
        }

        // if ($this->validate($rules)) {
        //     # code...
        // }

        $nama_service = $jenis;

        $btn_link = false;
        $update_link = 'lt.update_layanan';
        $delete_link = 'lt.delete_layanan';
        $third_button = ['name' => 'Forward', 'link' => 'lt.forward', 'active_column' => 'tujuan'];
        $modal_third_button = [
            // [
            //     'name' => 'service',
            //     'model' => 'service',
            //     'type' => 'select', 'options' => $nama_service
            // ],
            [
                'name' => 'tujuan',
                'model' => 'tujuan',
                'type' => 'select',
                'options' => $jenis
            ]
        ];

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
                ];
                if (auth()->user()->can('layanan-terpadu index')) {
                    $dataTables = LayananTerpadu::where('progress', '!=', 'selesai')->get();
                    array_push($modal_title, [
                        'delete' => 'Delete Pengajuan',
                        'forward' => 'Forward Pengajuan',
                    ]);
                } else {
                    $user_id = Auth::id();
                    $admin_layanan = AdminLayananModel::where('user_id', $user_id)->get();
                    $tujuan = $admin_layanan[0]->jenisLayanan->type;
                    $dataTables = LayananTerpadu::where('progress', '!=', 'selesai')->where('tujuan', $tujuan)->get();
                }

                break;
            case 'admin_riwayat':
                $modal_title = [
                    // 'tambah' => 'link',
                    'edit' => 'Edit Pengajuan',
                    // 'delete' => 'Delete Pengajuan',
                ];
                // $dataTables = LayananTerpadu::where('progress', 'selesai')->get();

                if (auth()->user()->can('layanan-terpadu index')) {
                    array_push($modal_title, [
                        'delete' => 'Delete Pengajuan',
                    ]);

                    $dataTables = LayananTerpadu::where('progress', 'selesai')->get();
                } else {
                    $user_id = Auth::id();
                    $admin_layanan = AdminLayananModel::where('user_id', $user_id)->get();
                    $tujuan = $admin_layanan[0]->jenisLayanan->type;
                    $dataTables = LayananTerpadu::where('progress', 'selesai')->where('tujuan', $tujuan)->get();
                }

                break;

            default:
                $modal_title = [];
                $dataTables = LayananTerpadu::where('user_id', Auth::id())->where('progress', 'selesai')->get();
                break;
        }
        $delete_msg = 'Apakah kamu yakin ingin menghapus pengaduan ini ?';


        $modal_field = [
            [
                'name' => 'service',
                'model' => 'service',
                'type' => 'select',
                'options' => $nama_service
            ],
            [
                'name' => 'nim',
                'model' => 'nim'
            ],
            [
                'name' => 'desc',
                'model' => 'desc'
            ],
            [
                'name' => 'file_balasan',
                'model' => 'file_balasan',
                'type' => 'file'
            ],
            [
                'name' => 'progress',
                'model' => 'progress',
                'type' => 'select',
                'options' => ['belum', 'diproses', 'selesai']
            ]
        ];


        $cols = ['Service', 'date', 'NIM/NIDN/KTP', 'Institution', 'desc', 'Status', 'Diteruskan', 'File Pengajuan', 'File Balasan'];
        $rows = ['service', 'date', 'nim', 'institusi', 'desc', 'progress', 'tujuan',  ['file', 'file', 'layanan_terpadu'], ['file_balasan', 'file', 'layanan_terpadu']];


        $data = [
            'title' => 'Daftar Pengajuan',
            'cols' => $cols,
            'rows' => $rows,
            'dataTables' => $dataTables,
            'modal_title' => $modal_title,
            'modal_field' => $modal_field,
            'btn_link' => $btn_link,
            'delete_msg' => $delete_msg,
            'update_link' => $update_link,
            'delete_link' => $delete_link,
            'third_button' => $third_button,
            'modal_third_button' => $modal_third_button
        ];
        return view('livewire.table', $data);
    }

    public function diteruskan()
    {
        dd($this->service);
    }
}
