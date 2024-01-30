<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Noreply extends Mailable
{
    use Queueable, SerializesModels;

   public $fullname;
    public function __construct($fullname)
    {
        $this->fullname = $fullname;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('We have received your message')
        ->view('emails.noreply');
    }
}
