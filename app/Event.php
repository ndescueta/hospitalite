<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //
      protected $table = 'tblevent';
      public $primaryKey = 'intEventId';
      public $timestamps = false;

      public function dates()
      {
        return $this->hasOne('App\Dates');
      }
}
