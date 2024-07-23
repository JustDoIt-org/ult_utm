<?php

namespace App\Livewire\Layanan;

use App\Models\ChatDiscussionModel;
use App\Models\DiscussionModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatGuest extends Component
{
    public $chatInput;
    public $user;
    public $type;
    public $id;

    public function render()
    {
        $discuss = DiscussionModel::where('tujuan', $this->type)->where('user_id', $this->id)->get();
        // dd(empty($discuss[0]));
        if (!empty($discuss[0])) {
            $chat = ChatDiscussionModel::where('discussion_id', $discuss[0]->id)->get();
        } else {
            $chat = [];
        }
        // dd($chat);

        return view('livewire.layanan.chat', ['chat' => $chat, 'title' => 'Hubungi Admin']);
    }

    public function save($type)
    {
        $match = ['tujuan' => $type, 'user_id' => $this->id];
        $discuss =  DiscussionModel::firstOrCreate($match);

        ChatDiscussionModel::create([
            'sender' => Auth::id(),
            'discussion_id' => $discuss->id,
            'chat' => $this->chatInput
        ]);

        $this->chatInput = null;
    }
}
