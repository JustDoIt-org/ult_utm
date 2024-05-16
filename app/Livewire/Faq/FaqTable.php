<?php

namespace App\Livewire\Faq;

use App\Livewire\Module\BaseTable;
use App\Livewire\Module\Trait\Notification;
use App\Models\Faq;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;

class FaqTable extends BaseTable
{
    use Notification;

    #[Locked]
    public $title = "Faq Table";

    protected array $permissions = [
        'create' => 'ult-informations create',
        'edit' => 'ult-informations edit',
        'delete' => 'ult-informations delete',
    ];

    protected array $modals = [
        'create' => 'faq-form-modal',
        'edit' => 'faq-form-modal',
        'delete' => 'faq-form-modal',
    ];

    public function render()
    {
        return view('pages.ult-informations.faq-ult.faq-table', $this->getData());
    }

    #[Computed]
    public function rows()
    {
        return Faq::search($this->search)
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->perPage);
    }

    public function cols()
    {
        return [
            [
                "label" => "Question",
                "query" => "question",
                "sort" => true,
            ],
            [
                "label" => "Answer",
                "query" => "answer",
                "sort" => false,
            ],
        ];
    }

    public function delete($id)
    {
        parent::delete($id);
        Faq::destroy($id);
        $this->toast(
            message: "Faq Removed",
        );
    }
}
