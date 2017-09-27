<?php

namespace App\Mail;

use App\Models\Contact;
use App\Models\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactRequestEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $requester;
    public $contact;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($requestID)
    {
        $this->requester = Request::find($requestID);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->contact = Contact::find($this->requester->contact_id);
        return $this->from($this->requester->email)->view('email.contact-requested');
    }
}
