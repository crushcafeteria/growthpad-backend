<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OnboardReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $fields;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($fields)
    {
        $this->fields = $fields;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('IMPORTANT: Request to join IREN Growthpad')->replyTo($this->fields['email'], $this->fields['name'])->markdown('emails.onboard');
    }
}
