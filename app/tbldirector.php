<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tbldirector extends Model
{
    //Table Name
    protected $table = 'tbldirector';
    public $primaryKey = 'intDirectorId';
    public $timestamps = false;
}
