<?php

namespace App\Livewire\PpidAdmin\Aspirasi;

use Livewire\Component;

class AspirasiForm extends Component
{
    protected array $permissions = [
        // 'create' => 'informasi-kouta create',
        'edit' => 'informasi-kouta edit',
        'delete' => 'informasi-kouta delete',
    ];


    public function render()
    {
        return view('pages.admin.ppid.request-form');
    }
}
