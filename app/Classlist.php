<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classlist extends Model
{
    protected $guarded=[];

    public function classrecords()
    {
        return $this->hasMany(ClassRecord::class,'imported_classlists_id');
    }
}
