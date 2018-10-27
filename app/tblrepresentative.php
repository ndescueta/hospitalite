<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tblrepresentative extends Model
{
  //Table name
  protected $table = 'tblrepresentative';
  //Primary
  protected $primaryKey = 'intRepresentativeId';
/*  public $homeContent_title = 'txtTitle';
  public $homeContent_description = 'txtDescription';*/
  public $timestamps = false;
}
