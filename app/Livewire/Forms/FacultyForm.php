<?php

namespace App\Livewire\Forms;

use App\Models\Faculty;
use Livewire\Attributes\Locked;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FacultyForm extends Form
{
    #[Locked]
    public $id;

    #[Validate]
    public $name;

    #[Validate]
    public $code;

    public function rules()
    {
        return ($this->id == 0) ? [
            'name' => ['required', 'unique:faculties,name'],
            'code' => ['required', 'unique:faculties,code'],
        ] : [
            'name' => ['required'],
            'code' => ['required'],
        ];
    }

    public function load(int $id)
    {
        $faculty = Faculty::find($id);
        $this->id = $faculty->id;
        $this->name = $faculty->name;
        $this->code = $faculty->code;
    }

    public function clear()
    {
        $this->id = 0;
        $this->name = '';
        $this->code = '';
    }

    public function post()
    {
        $this->validate();
        return Faculty::updateOrCreate(['id' => $this->id], $this->all());
    }
}
