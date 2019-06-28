<?php

namespace App\Jobs;

use App\Library\SMS;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class SendBulkSMS implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 3;
    public $timeout = 60;
    public $recipients;
    public $message;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($recipients, $message)
    {
        $this->message = $message;
        $this->recipients = $recipients;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        SMS::send($this->recipients, $this->message);
    }
}
