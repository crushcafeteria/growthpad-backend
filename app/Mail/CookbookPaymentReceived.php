<?php

namespace App\Mail;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CookbookPaymentReceived extends Mailable
{
    use Queueable, SerializesModels;

    public $payment;
    public $paypal;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Payment $payment, $paypal = false)
    {
        $this->payment = $payment;
        $this->paypal = $paypal;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Payment Received!')->markdown('emails.cookbook-payment-received');
    }
}
