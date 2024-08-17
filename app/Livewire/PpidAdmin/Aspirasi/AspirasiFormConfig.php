<?php

namespace App\Livewire\PpidAdmin\Aspirasi;

use App\Models\PpidAspirasiPengaduan;
use App\Models\RequestPpid;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\Form;

class AspirasiFormConfig extends Form
{
    #[Locked]
    public $id;

    #[Validate('required')]
    public $progress;

    public function load(int $id)
    {
        $ik = PpidAspirasiPengaduan::find($id);
        $this->progress = $ik->status->progress;
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

        return PpidAspirasiPengaduan::updateOrCreate(['id' => $this->id], [
            'id' => $this->id,
            'status_ppid' => $this->progress
        ]);
    }
}
