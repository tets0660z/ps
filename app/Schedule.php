<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $guarded=[];

    public function users()
    {
        return $this->belongsTo(User::class,'instructor_id');
    }
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'subject_id');
    }
}
