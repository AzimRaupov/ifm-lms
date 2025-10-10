<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    protected $fillable=['class_id','magazine_id','student_id','grade','topic','date'];
}
