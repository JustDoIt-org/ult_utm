<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Form;

class CarouselUltForm extends Form
{
    #[Validate]
    public $linkImage;

    #[Validate]
    public $linkButton;

    #[Validate]
    public $nameButton;

    public function rules()
    {
        return [
            'linkImage' => ['required'],
            'linkButton' => ['required'],
            'nameButton' => ['required'],
        ];
    }

    public function clear()
    {
        $this->linkImage = "";
        $this->linkButton = "";
        $this->nameButton = "";
    }

    public function post()
    {
        $this->validate();
        return \App\Models\Carousel::updateOrCreate($this->all());
    }
}
