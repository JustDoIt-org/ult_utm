<?php

namespace App\Livewire\Forms;

use App\Models\Faq;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FaqForm extends Form
{
    #[Locked]
    public $id;

    #[Validate('required')]
    public $question;

    #[Validate('required')]
    public $answer;

    public function load(int $id)
    {
        $faq = Faq::find($id);
        $this->id = $faq->id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
    }

    public function clear()
    {
        $this->id = 0;
        $this->question = '';
        $this->answer = '';
    }

    public function post()
    {
        $this->validate();
        return Faq::updateOrCreate(['id' => $this->id], $this->all());
    }
}
