<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblhospital extends Model
{
    //Table Name
    protected $table = 'tblhospital';
    protected $primaryKey = 'intHospitalId';
    public $timestamps = false;
}
