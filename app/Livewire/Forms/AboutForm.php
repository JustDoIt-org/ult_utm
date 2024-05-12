<?php

namespace App\Livewire\Forms;

use App\Livewire\Module\Trait\Notification;
use App\Models\About;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AboutForm extends Component
{
    use Notification;

    #[Validate('required')]
    public $title;

    #[Validate('required')]
    public $desc;

    public function render()
    {
        $this->load();
        return view('pages.ult-informations.about-ult.about-form');
    }

    public function load()
    {
        $about = About::first();
        $this->title = $about->title;
        $this->desc = $about->desc;
    }

    public function clear()
    {
        $this->title = '';
        $this->desc = '';
    }

    public function save()
    {
        $this->validate();
        About::first()->update($this->all());
        return $this->toast(
            message: 'Updated',
            type: 'success'
        );
    }
}
