<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;

class SendCode 
{
    //
    public static function sendCode($msg, $no)
    {
        $nexmo = app('Nexmo\Client');

        $nexmo->message()->send([
            'to'   => $no,
            'from' => '639059462732',
            'text' => $msg
        ]);
    }
}
