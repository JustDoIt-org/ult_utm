<?php

namespace App\Livewire\Faculty;

use App\Livewire\Module\BaseTable;
use App\Livewire\Module\Trait\Notification;
use App\Models\Faculty;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;

class FacultiesTable extends BaseTable
{
    use Notification;

    #[Locked]
    public $title = "Faculties Table";

    protected array $permissions = [
        'create' => 'faculty create',
        'edit' => 'faculty edit',
        'delete' => 'faculty delete',
    ];

    protected array $modals = [
        'create' => 'faculty-form-modal',
        'edit' => 'faculty-form-modal',
    ];

    public function render()
    {
        return view('pages.admin.faculty.faculties-table', $this->getData());
    }

    #[Computed]
    public function rows()
    {
        return Faculty::search($this->search)
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->perPage);
    }

    public function cols()
    {
        return [
            [
                "label" => "Name",
                "query" => "name",
                "sort" => true,
            ],
            [
                "label" => "Code",
                "query" => "code",
                "sort" => false,
            ],
        ];
    }

    public function delete($id)
    {
        parent::delete($id);
        Faculty::destroy($id);
        $this->toast(
            message: "Faculty Removed",
        );
    }
}
