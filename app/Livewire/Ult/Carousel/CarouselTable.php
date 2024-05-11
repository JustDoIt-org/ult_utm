<?php

namespace App\Livewire\Ult\Carousel;

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
        'create' => 'carousel create',
        'edit' => 'carousel edit',
        'delete' => 'carousel delete',
    ];

    protected array $modals = [
        'create' => 'carousel-form-modal',
        'edit' => 'carousel-form-modal',
    ];

    public function render()
    {
        return view('livewire.ult.carousel.carousel-table', $this->getData());
    }

    #[Computed]
    public function rows()
    {
        // return Carousel::search($this->search)
        //     ->orderBy($this->sort_by, $this->sort_direction)
        //     ->paginate($this->perPage);
        return Carousel::all();
    }

    public function cols()
    {
        return [
            [
                "label" => "Name",
                "query" => "name",
                "sort" => true,
            ],
        ];
    }

    public function delete($id)
    {
        parent::delete($id);
        Carousel::destroy($id);
        $this->toast(
            message: "Carousel Removed",
        );
    }
}
