<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable=['user_id','class_id'];

    public function class()
    {
        return $this->belongsTo(Sinf::class, 'class_id');
    }
}
