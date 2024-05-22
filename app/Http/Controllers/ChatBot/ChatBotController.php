<?php

namespace App\Http\Controllers\ChatBot;

use App\Http\Controllers\ChatBot\Conversations\FaqConversation;
use App\Http\Controllers\Controller;
use BotMan\BotMan\Messages\Attachments\Image;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\OutgoingMessage;
use BotMan\BotMan\Traits\HandlesConversations;

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
