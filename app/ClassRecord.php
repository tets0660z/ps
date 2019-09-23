<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ImportedClasslist;
class ClassRecord extends Model
{
    protected $guarded=[];
    protected $casts = [    
    //  'grid_col'=>'array',
    //  'grid_row'=>'array'
    ];

    public function importedclasslists()
    {
        return $this->belongsTo(ImportedClasslist::class,'imported_classlists_id');
    }

}
