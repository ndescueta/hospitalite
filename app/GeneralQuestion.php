<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GeneralQuestion extends Model
{
    protected $table = 'tblgeneralquestion';
    public $primaryKey = 'intGeneralQuestionId';
    public $timestamps = false;
}
