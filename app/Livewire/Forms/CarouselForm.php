<?php

namespace App\Livewire\Forms;

use App\Livewire\Module\Trait\Notification;
use App\Models\Carousel;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class CarouselForm extends Component
{
    use WithFileUploads, Notification;

    #[Validate('required')]
    public $nameButton;

    #[Validate('required')]
    public $linkButton;

    #[Validate('image|max:2048')]
    public $photo;

    public function render()
    {
        return view('pages.ult-informations.carousel-ult.carousel-form', ["photos" => Carousel::all()]);
    }

    public function clear()
    {
        $this->nameButton = '';
        $this->linkButton = '';
        $this->photo = null;
    }

    public function save()
    {
        $this->validate();

        if(Carousel::all()->count() < 5) {
            $fileName = $this->photo->store('carousel', 'public');

            Carousel::create([
                'nameButton' => $this->nameButton,
                'linkButton' => $this->linkButton,
                'photo' => $fileName,
            ]);

            $this->clear();

            return $this->toast(
                message: 'Uploaded',
                type: 'success'
            );
        }else{
            $this->clear();

            return $this->toast(
                message: 'Failed to Upload',
                type:'error'
            );
        }
    }

    public function delete($id)
    {
        $item = Carousel::where('id', $id)->first();
        unlink(public_path('storage/'.$item->photo));
        $item->delete();

        $this->toast(
            message: "User Removed",
        );
    }
}
