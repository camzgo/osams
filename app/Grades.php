<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grades extends Model
{
    //

    protected $table = 'grades';
    protected $fillable = ['subject', 'grades', 'created_at', 'semester', 'grades_isdel', 'new' ];
}
