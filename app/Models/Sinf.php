<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sinf extends Model
{
    protected $fillable=['teacher_id','literal_int','literal_char'];


    public function students()
    {
        return $this->belongsToMany(User::class,'students','class_id');

    }

    public function teachers()
    {
        return $this->belongsToMany(User::class,'magazines','class_id','teacher_id');
    }

    public function magazines()
    {
        return $this->hasMany(Magazine::class,'class_id');
    }
}
