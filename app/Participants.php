<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participants extends Model
{
  //Table name
  protected $table = 'tblparticipants';
  //Primary
  protected $primaryKey = 'intParticipantId';

  public $timestamps = false;
}
