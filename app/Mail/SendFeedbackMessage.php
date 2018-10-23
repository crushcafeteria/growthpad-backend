<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendFeedbackMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct(Request $request){
        $this->data = $request;
    }

    public function build(){
        return $this
            ->subject('New feedback message!')
            ->from($this->data->email)
            ->replyTo($this->data->email)
            ->cc('nelcon@lipasafe.com')
            ->markdown('emails.send-message');
    }
}
