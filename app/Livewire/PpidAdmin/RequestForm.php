<?php

namespace App\Livewire\PpidAdmin;

use Livewire\Component;

class RequestForm extends Component
{
    protected array $permissions = [
        'create' => 'informasi-kouta create',
        'edit' => 'informasi-kouta edit',
        'delete' => 'informasi-kouta delete',
    ];

    
    public function render()
    {
        return view('pages.admin.ppid.request-form');
    }
}
