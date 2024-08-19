<?php

namespace App\Livewire\Visit;

use App\Livewire\Module\Trait\Notification;
use App\Models\VisitAbsen;
use Livewire\Attributes\Validate;
use Livewire\Component;

class KonfirmasiAbsensiForm extends Component
{
    use Notification;

    #[Validate('required')]
    public $code;

    public function render()
    {
        return view('livewire.visit.konfirmasi-absensi-form');
    }

    public function submit(){
        $code = VisitAbsen::getCodeAbsensi($this->code);
        if($code){

            $update['absen'] = "sudah";
            $code->fill($update);

            $code->update();
            return $this->toast(
                message: 'Berhasil Absen',
                type: 'success'
            );
        }else{
            return $this->toast(
                message: 'Maaf code absen anda tidak ada, harap pastikan pengajuan anda disetujui!!',
                type: 'error'
            );
        }
    }
}
