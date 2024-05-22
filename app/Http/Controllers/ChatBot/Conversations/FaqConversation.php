<?php

namespace App\Http\Controllers\ChatBot\Conversations;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class FaqConversation extends Conversation
{

    /**
     * Place your BotMan logic here.
     */
    public function askHelp()
    {
        $this->ask('Ketik apa yang ingin anda tanyakan ?', function(Answer $answer) {
            $search = $answer->getText();
            $req = Faq::where('question', 'LIKE', "%{$search}%")->orWhere('answer', 'LIKE', "%{$search}%")->paginate(5)->items();

            if(count($req) > 0){
                $this->askFaq($req);
            }else{
                $this->say("Maaf saya tidak mengerti pertanyaan anda.");
            }

        });
    }

    public function askFaq($req)
    {
        $question = Question::create("FAQ")
            ->addButtons([...$this->listFaq($req)]);

        $this->ask($question, function (Answer $answer) {
            // Detect if button was clicked:
            if ($answer->isInteractiveMessageReply()) {
                $this->say($answer->getValue());

                $this->askNextStep();
            }
        });
    }

    public function askNextStep()
    {
        $this->ask('Apakah ada yang ingin anda tanyakan lagi ?', [
            [
                'pattern' => 'yes|yep|ya|yeah|ye|y|yaa',
                'callback' => function () {
                    $this->askHelp();
                }
            ],
            [
                'pattern' => 'nah|no|nope|tidak|ga|ngga|g',
                'callback' => function () {
                    $this->say('Terima Kasih :)!!');
                }
            ],
        ]);
    }

    public function listFaq($list)
    {
        $datas = [];

        foreach ($list as $value) {
            $datas[] = Button::create($value->question)->value($value->answer);
        }

        return $datas;
    }

    public function run() {
        $this->askHelp();
    }
}
