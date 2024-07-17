<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Module\Trait\Notification;

class LayananTerpadu extends Component
{

    use Notification, WithFileUploads;


    public $date;
    public $name;
    public $gender = 'man';
    public $age;
    public $nohp;
    public $address;
    public $institusi;
    public $nim;
    public $service = 'Layanan Akademik';
    public $desc;
    public $file;
    public function render()
    {
        $from_data = [
            ['title' => 'Date', 'model' => 'date', 'type' => 'date'],
            ['title' => 'Name', 'model' => 'name', 'type' => 'text'],
            ['title' => 'Genders', 'model' => 'gender', 'type' => 'select', 'select_item' => ['man', 'woman']],
            ['title' => 'Age', 'model' => 'age', 'type' => 'number'],
            ['title' => 'Phone number', 'model' => 'nohp', 'type' => 'number'],
            ['title' => 'Address', 'model' => 'address', 'type' => 'text'],
            ['title' => 'institution', 'model' => 'institusi', 'type' => 'text'],
            ['title' => 'NIM/NIDN/KTP', 'model' => 'nim', 'type' => 'text'],
            [
                'title' => 'Type of service',
                'model' => 'service',
                'type' => 'select',
                'select_item' => [
                    'Layanan Akademik',
                    'Layanan Kemahasiswaan',
                    'Layanan Keuangan',
                    'Layanan Umum',
                    'Layanan Kerjasama',
                    'Layanan Kunjungan Sekolah',
                    'Lainnya',
                ],
            ],
            ['title' => 'Complaint description', 'model' => 'desc', 'type' => 'textarea'],
            ['title' => 'File', 'model' => 'file', 'type' => 'file'],
        ];

        return view('livewire.layanan-terpadu',  ['data' => $from_data]);
    }

    public function save()
    {

        $rules = [
            "date" => 'required',
            "name" => 'required',
            "gender" => 'required',
            "age" => 'required',
            "nohp" => 'required',
            "address" => 'required',
            "institusi" => 'required',
            "nim" => 'required',
            "service" => 'required',
            "desc" => 'required',
            "file" => 'mimes:jpg,png,pdf|extensions:jpg,png,pdf',
        ];

        $this->validate($rules);

        $variables =
            [
                $this->date,
                $this->name,
                $this->gender,
                $this->age,
                $this->nohp,
                $this->address,
                $this->institusi,
                $this->nim,
                $this->service,
                $this->desc,
                $this->file,
            ];
        dd($variables);
    }
}
