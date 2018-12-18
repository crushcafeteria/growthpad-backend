<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEnquiryNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $enquiry;
    public $extraFields = ['LEASING', 'MARKET-ADVISORY', 'CONSULTING'];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($enquiry)
    {
        $this->enquiry = $enquiry;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New enquiry - '.$this->enquiry->type)->view('email.enquiry-requested');
    }
}
