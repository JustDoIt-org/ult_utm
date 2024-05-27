<?php

namespace App\Http\Controllers\ChatBot;

use App\Http\Controllers\ChatBot\Conversations\FaqConversation;
use App\Http\Controllers\Controller;

class ChatBotController extends Controller
{

    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {

            $botman->startConversation(new FaqConversation);

        });

        $botman->listen();
    }
}
