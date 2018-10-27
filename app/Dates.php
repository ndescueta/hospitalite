<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dates extends Model
{
  protected $table = 'tbldate';
  public $primaryKey = 'intDateId';
  public $timestamps = 'false';

  public function event()
  {
    return $this->belongsTo('App\Event');
  }
}
