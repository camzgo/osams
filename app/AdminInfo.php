<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminInfo extends Model
{
    //

    protected $table = 'admins_info';
    protected $fillable = ['gender', 'birthdate', 'nationality', 'religion', 'civil_status', 'mobile_number', 'municipality', 'barangay', 'street', 'admins_id'];
}
