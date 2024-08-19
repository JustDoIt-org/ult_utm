<?php

namespace App\Livewire\PpidAdmin\Aspirasi;

use Livewire\Form;
use Livewire\Component;
use App\Models\StatusPpid;
use App\Models\RequestPpid;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use App\Models\PpidAspirasiPengaduan;

class AspirasiFormConfig extends Form
{
    #[Locked]
    public $id;

    #[Validate('required')]
    public $progress;

    public $file_balasan;

    public $status_ppid;

    public $file;

    public function load(int $id)
    {
        $ik = PpidAspirasiPengaduan::find($id);
        $this->progress = $ik->status->progress;
        $this->file = $ik->status->file;
        $this->id = $ik->id;
    }

    public function clear()
    {
        $this->id = 0;
    }

    public function post()
    {
        $this->validate();

        switch ($this->progress) {
            case 'belum':
                $this->progress = 1;
                break;
            case 'diproses':
                $this->progress = 2;
                break;
            default:
                $this->progress = 3;
                break;
        }


        if ($this->file_balasan) {
            $fileName = '/' . $this->file_balasan->store('request/file_balasan', 'public');
        } else {
            $fileName = '';
        }

        return StatusPpid::updateOrCreate(['id' => $this->status_ppid], [
            'progress' => $this->progress,
            'file_balasan' => $fileName,
        ]);

        // return PpidAspirasiPengaduan::updateOrCreate(['id' => $this->id], [
        //     'id' => $this->id,
        //     'status_ppid' => $this->progress
        // ]);
    }
}
