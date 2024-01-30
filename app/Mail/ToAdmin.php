<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ToAdmin extends Mailable
{
    use Queueable, SerializesModels;

   
    public $fullname, $email_address, $phone_number, $mess;
    public function __construct($fullname, $email_address, $phone_number, $message)
    {
        $this->fullname = $fullname;
        $this->email_address = $email_address;
        $this->phone_number = $phone_number;
        $this->mess = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New message from MTSCS site')
        ->view('emails.toadmin');
    }
}
