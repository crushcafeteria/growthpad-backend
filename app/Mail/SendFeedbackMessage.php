<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Http\Request;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendFeedbackMessage extends Mailable
{

    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this
            ->subject('New feedback message!')
            ->from($this->data['email'])
            ->replyTo($this->data['email'])
            ->cc('nelson@lipasafe.com')
            ->markdown('emails.send-message');
    }
}
