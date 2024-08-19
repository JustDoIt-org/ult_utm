<?php

namespace App\Livewire\Visit;

use App\Livewire\Module\Trait\Notification;
use App\Models\KodeKunjunganModel;
use App\Models\VisitAbsen;
use Livewire\Attributes\Validate;
use Livewire\Component;

class KonfirmasiAbsensiForm extends Component
{
    use Notification;

    #[Validate('required')]
    public $code;
    public $code_kunjungan;

    public function render()
    {
        return view('livewire.visit.konfirmasi-absensi-form');
    }

    public function submit()
    {

        $kode_kunjungan = KodeKunjunganModel::whereDay('created_at', now()->day)->get();

        if ($kode_kunjungan == $this->code_kunjungan) {
            $code = VisitAbsen::getCodeAbsensi($this->code);
            if ($code) {

                $update['absen'] = "sudah";
                $code->fill($update);

                $code->update();
                return $this->toast(
                    message: 'Berhasil Absen',
                    type: 'success'
                );
            } else {
                return $this->toast(
                    message: 'Maaf code absen anda tidak ada, harap pastikan pengajuan anda disetujui!!',
                    type: 'error'
                );
            }
        } else {
            return $this->toast(
                message: 'Maaf code kunjungan salah, harap tanyakan kode yang benar ke petugas',
                type: 'error'
            );
        }
    }
}
