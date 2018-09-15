<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pcl extends Model
{
    //
    protected $table = 'pcl';
    protected $fillable = ['surname', 'first_name', 'middle_name', 'suffix', 'mobile_number', 'district', 'municipality', 'barangay', 'street',
    'school_enrolled',  'course', 'year_level', 'gender', 'birthdate', 'nationality', 'religion', 'civil_status', 'birth_place', 'fsurname',
    'ffirst_name', 'fmiddle_name', 'fsuffix', 'foccupation', 'msurname', 'mfirst_name', 'mmiddle_name', 'msuffix', 'moccupation', 'address', 'emergency', 'emobile_number'];
}
