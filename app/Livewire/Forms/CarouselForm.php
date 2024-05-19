<?php

namespace App\Livewire\Forms;

use App\Models\Carousel;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CarouselForm extends Form
{

    #[Locked]
    public $id;

    #[Validate('required')]
    public $nameButton;

    #[Validate('required')]
    public $linkButton;

    #[Validate('max:2048|mimes:png,jpg,jpeg')]
    public $photo;

    public function load(int $id)
    {
        $carousel = Carousel::find($id);
        $this->id = $carousel->id;
        $this->photo = $carousel->photo;
        $this->nameButton = $carousel->nameButton;
        $this->linkButton = $carousel->linkButton;
    }

    public function clear()
    {
        $this->id = 0;
        $this->photo = null;
        $this->nameButton = '';
        $this->linkButton = '';
    }

    public function post()
    {
        $this->validate();
        $fileName = '/'.$this->photo->store('carousel', 'public');

        if($this->id != 0){
            $carousel = Carousel::find($this->id);
            unlink(public_path('storage/'.$carousel->photo));
        }

        return Carousel::updateOrCreate(['id' => $this->id], [
            'nameButton' => $this->nameButton,
            'linkButton' => $this->linkButton,
            'photo' => $fileName,
        ]);

    }
}
