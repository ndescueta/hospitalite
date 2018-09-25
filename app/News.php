<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'tblnews';
    public $primaryKey = 'intNewsId';
    public $timestamps = 'true';
}
