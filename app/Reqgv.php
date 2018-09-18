<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reqgv extends Model
{
    //
    

    protected $table = 'reqgv';
    protected $fillable = ['biodata', 'cor', 'or', 'grades', 'brgy', 'oid', 'honor', 'biodata_sub', 'cor_sub', 'or_sub', 'grades_sub', 'brgy_sub',
    'oid_sub', 'honor_sub'];
}
