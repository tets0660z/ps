<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
 protected $guarded =[];
 public function schedules()
 {
     return $this->belongsToMany(Schedule::class);
 }
}
