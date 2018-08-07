<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Faquestion extends Model
{
    //
    protected $fillable = ['question', 'answer', 'faq_isdel'];
}
