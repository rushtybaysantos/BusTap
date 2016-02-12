<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddAccount extends Model
{
    protected $table = 'add_accounts';

    protected $primaryKey = 'id';

    protected $fillable = ['acc_fname', 'acc_mname', 'acc_lname', 'acc_type', 'password'];

    protected $hidden = ['password'];
}
