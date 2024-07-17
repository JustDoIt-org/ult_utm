<?php

namespace App\Livewire\Layanan;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Livewire\Module\Trait\Notification;
use App\Models\LayananTerpadu as ModelsLayananTerpadu;
use Illuminate\Support\Facades\Auth;

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
        ];
        if ($this->file) {
            $rules['file'] = 'mimes:jpg,png,pdf|extensions:jpg,png,pdf';
        }

        if (!$this->validate($rules)) {
            $this->file = null;
        }


        $data = ModelsLayananTerpadu::create([
            'user_id' => Auth::id(),
            'date' => $this->date,
            'name' => $this->name,
            'gender' => $this->gender,
            'age' => $this->age,
            'nohp' => $this->nohp,
            'address' => $this->address,
            'institusi' => $this->institusi,
            'nim' => $this->nim,
            'service' => $this->service,
            'desc' => $this->desc,
            'file' => $this->file,
        ]);
        $this->resetInput();


        request()->session()->flash('data', $data->name);

        return $this->swal(
            title: 'Berhasil',
            message: 'Berhasil ' . $data->name,
            type: 'success'
        );
    }


    private function resetInput()
    {
        $this->date = null;
        $this->name = null;
        $this->gender = 'man';
        $this->age = null;
        $this->nohp = null;
        $this->address = null;
        $this->institusi = null;
        $this->nim = null;
        $this->service = 'Layanan Akademik';
        $this->desc = null;
        $this->file = null;
    }
}
