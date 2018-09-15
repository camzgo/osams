<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eefapgv extends Model
{
    //
    protected $table = 'eefapgv';
    protected $fillable = ['surname', 'first_name', 'middle_name', 'suffix', 'mobile_number', 'municipality', 'barangay', 'street',
    'college_name', 'college_address', 'course', 'major', 'program_type', 'year_level', 'graduating',
    'general_average', 'spes', 'awards'];
}
