<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function chat_guest()
    {
        return view('pages.terpadu.chat', ['title' => 'Chat Admin', 'type' => 'layanan', 'view' => 'guest', 'id' => Auth::id()]);
    }

    public function chat_admin()
    {
        return view('pages.terpadu.list-chat', ['title' => 'Chat', 'type' => 'layanan', 'view' => 'admin']);
    }

    public function chat_admin_guest(Request $request, $id)
    {
        return view('pages.terpadu.chat', ['title' => 'Chat', 'type' => 'layanan', 'view' => 'admin', 'id' => $id]);
    }
}
