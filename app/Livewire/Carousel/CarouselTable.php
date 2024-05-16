<?php

namespace App\Livewire\Carousel;

use App\Livewire\Module\BaseTable;
use App\Livewire\Module\Trait\Notification;
use App\Models\Carousel;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;

class CarouselTable extends BaseTable
{
    use Notification;

    #[Locked]
    public $title = "Carousel Table";

    protected array $permissions = [
        'create' => 'ult-informations create',
        'edit' => 'ult-informations edit',
        'delete' => 'ult-informations delete',
    ];

    protected array $modals = [
        'create' => 'carousel-form-modal',
        'edit' => 'carousel-form-modal',
    ];

    public function render()
    {
        return view('pages.ult-informations.carousel-ult.carousel-table', $this->getData());
    }

    #[Computed]
    public function rows()
    {
        return Carousel::search($this->search)
            ->orderBy($this->sort_by, $this->sort_direction)
            ->paginate($this->perPage);
    }

    public function cols()
    {
        return [
            [
                "label" => "Image",
                "query" => "photo",
                "sort" => false,
            ],
            [
                "label" => "Name",
                "query" => "nameButton",
                "sort" => true,
            ],
            [
                "label" => "Link",
                "query" => "linkButton",
                "sort" => false,
            ],
        ];
    }

    public function delete($id)
    {
        $carousel = Carousel::find($id);

        unlink(public_path('storage/'.$carousel->photo));
        parent::delete($id);
        $carousel->delete();
        $this->toast(
            message: "Carousel Removed",
        );
    }
}
