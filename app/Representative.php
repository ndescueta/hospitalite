<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Representative extends Model
{
    protected $table = 'tblrepresentative';
    public $primaryKey = 'intRepresentativeId';
    public $timestamps = false;
}
