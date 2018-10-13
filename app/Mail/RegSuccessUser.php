<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegSuccessUser extends Mailable
{
    use Queueable, SerializesModels;
    public $arr2;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($arr2)
    {
        //
        $this->arr2 = $arr2;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       return $this->subject('Registration Success!')->markdown('emails.regsuccessuser');
    }
}
