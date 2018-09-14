<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    //
    protected $table = 'guardian_info';
    protected $fillable = ['surname', 'first_name', 'middle_name', 'suffix', 'mobile_number', 'gender', 'nationality', 'occupation', 'civil_status', 
    'municipality', 'barangay', 'bday', 'relationship' ];
}
