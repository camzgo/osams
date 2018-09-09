<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountType extends Model
{
    //
    protected $table = 'account_type';
    protected $fillable = ['account_name', 'account_desc', 'file_maintenance', 'tracking', 'transactions', 'utilities', 'reports'];
}
