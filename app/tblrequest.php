<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblrequest extends Model
{
  //Table name
  protected $table = 'tblrequest';
  //Primary
  protected $primaryKey = 'intRequestId';
/*  public $homeContent_title = 'txtTitle';
  public $homeContent_description = 'txtDescription';*/
  public $timestamps = false;
}
