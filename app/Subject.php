<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $guarded=[];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'subject_id');
    }
}
