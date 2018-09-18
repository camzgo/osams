<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reqeefap extends Model
{
    //
    protected $table = 'reqeefap';
    protected $fillable = ['biodata', 'cor', 'or', 'grades', 'brgy', 'oid', 'biodata_sub', 'cor_sub', 'or_sub', 'grades_sub', 'brgy_sub',
    'oid_sub'];
}
