<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeContent extends Model
{
    //Table name
    protected $table = 'tblhomecontent';
    //Primary
    protected $primaryKey = 'intHomeContentId';
  /*  public $homeContent_title = 'txtTitle';
    public $homeContent_description = 'txtDescription';*/
    public $timestamps = false;
}
