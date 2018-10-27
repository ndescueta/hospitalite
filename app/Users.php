<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'tbluser';
    public $primaryKey = 'intUserId';
    public $timestamps = false;
}
