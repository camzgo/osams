<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tracking extends Model
{
    //
    protected $table = "tracking";
    protected $fillable = ['stage', 'status', 'scholarship_id'];
}
