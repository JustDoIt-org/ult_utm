<?php

namespace App\Livewire\Carousel;

use App\Livewire\Forms\CarouselForm;
use App\Livewire\Module\BaseModal;
use App\Livewire\Module\Trait\Notification;
use App\Models\Carousel;
use Livewire\Attributes\Computed;
use Livewire\WithFileUploads;

class CarouselFormModal extends BaseModal
{
    use Notification, WithFileUploads;

    public CarouselForm $form;

    /*
     * normal modal title
     * @var string
     */
    protected static $title = "Add New Carousel";

    /*
     * load modal title
     * @var string
     */
    protected static $load_title = "Update Carousel";

    /*
     * save or load permission
     * @var string|bool
     */
    protected $permission = [
        'load' => 'ult-informations edit',
        'save' => 'ult-informations create'
    ];

    public function mount()
    {
        $this->clear();
    }

    public function render()
    {
        return view('pages.ult-informations.carousel-ult.carousel-form-modal');
    }

    #[Computed(persist: true)]
    public function carousels()
    {
        return Carousel::all();
    }

    public function load($id)
    {
        parent::load($id);
        $this->form->load($id);
    }

    public function save()
    {
        if(!$this->load_state){

            if(Carousel::all()->count() < 5){
                parent::save();
                if($this->form->post()) {
                    $this->dispatch('close-modal', name: $this->modal_name);
                    $this->dispatch('carousel-table:reload');
                    $this->toast(
                        message: $this->form->id == 0 ? 'Carousel Created' : 'Carousel Updated',
                        type: 'success'
                    );
                }
            }else{
                return $this->toast(
                    message: 'Failed to Upload',
                    type:'error'
                );
            }
        }else{
            parent::save();
            if($this->form->post()) {
                $this->dispatch('close-modal', name: $this->modal_name);
                $this->dispatch('carousel-table:reload');
                $this->toast(
                    message: $this->form->id == 0 ? 'Carousel Created' : 'Carousel Updated',
                    type: 'success'
                );
            }
        }
    }

    public function clear()
    {
        parent::clear();
        $this->form->clear();
    }
}
