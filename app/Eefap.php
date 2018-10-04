<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eefap extends Model
{
    //
    protected $table = 'eefap';
    protected $fillable = ['surname', 'first_name', 'middle_name', 'suffix', 'mobile_number', 'fb_account', 'gsurname', 'gfirst_name', 'gmiddle_name', 'gsuffix', 'gmobile_number', 
    'municipality', 'barangay', 'street', 'college_name', 'college_address', 'course', 'major', 'program_type', 'year_level', 'graduating',
    'general_average'];
}
