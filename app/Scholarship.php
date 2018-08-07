<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    //
    protected $fillable = ['scholarship_name', 'scholarship_desc', 'amount', 'deadline', 'slot', 'status'];
}
