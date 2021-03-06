<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegSuccess extends Mailable
{
    use Queueable, SerializesModels;
    public $arr;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($arr)
    {
        //
        $this->arr = $arr;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Registration Success!')->markdown('emails.regsuccess');
    }
}
