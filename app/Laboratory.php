<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laboratory extends Model
{
    protected $guarded=[];
    
    protected $casts = [
        'scores' => 'array',
        'student_scores' => 'array',
    ];
}
