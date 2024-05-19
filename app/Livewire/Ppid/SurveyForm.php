<?php

namespace App\Livewire\Ppid;

use Livewire\Component;
use App\Models\SurveyPpid;
use Illuminate\Http\Request;
use App\Models\ResultSurveyPpid;
use Illuminate\Support\Facades\Auth;
use App\Livewire\Module\Trait\Notification;

class SurveyForm extends Component
{
    use Notification;

    public $hasil;
    public $kemudahan;
    public $kecepatan;
    public $akurasi;
    public $biaya;
    public $arr = ['kemudahan', 'kecepatan', 'akurasi', 'biaya'];

    public function render()
    {

        return view('pages.ppid.survey-form');
    }

    public function store()
    {

        $id = Auth::id();
        $this->validate([
            "kemudahan" => 'required',
            "kecepatan" => 'required',
            "akurasi" => 'required',
            "biaya" => 'required',
        ]);

        $arr = [$this->kemudahan, $this->kecepatan, $this->akurasi, $this->biaya];
        $i = 1;

        foreach ($arr as $key) {
            ResultSurveyPpid::updateOrCreate(
                ['user_id' =>  $id, 'survey_ppid_id' => $i],
                ['hasil' => $key,]
            );
            $i++;
        }


        $this->resetInput();
        return $this->toast(
            message: 'Berhasil',
            type: 'success'
        );
    }


    private function resetInput()
    {
        $this->kemudahan = null;
        $this->kecepatan = null;
        $this->akurasi = null;
        $this->biaya = null;
    }
}
