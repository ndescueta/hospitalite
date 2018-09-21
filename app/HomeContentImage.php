<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HomeContentImage extends Model
{
    //
    protected $table = 'tblhomecontentimage';
    //Primary
    protected $primaryKey = 'intImageId';
  /*  public $homeContent_title = 'txtTitle';
    public $homeContent_description = 'txtDescription';*/
    public $timestamps = false;
}
