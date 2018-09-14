<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    //
    protected $table = "education_info";
    protected $fillable = ['course', 'yr_lvl', 'yr_entered', 'duration', 'college_name', 'college_address'];
}
