<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{
    //
    protected $table = 'personal_info';
    protected $fillable = ['nationality', 'religion', 'civil_status', 'birth_place', 'municipality', 'barangay', 'street'];
}
