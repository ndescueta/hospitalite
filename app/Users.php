<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'tbladmin';
    public $primaryKey = 'id';
    public $timestamps = false;
}
