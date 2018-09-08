<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $table = 'application';

    protected $fillable = ['application_status', 'renew', 'application_isdel'];
}
