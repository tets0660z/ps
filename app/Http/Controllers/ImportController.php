<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ImportController extends Controller 
{
    public function import() 
    {
        Excel::import(new UsersImport, storage_path('../../../../\Users\dsfga\Desktop\classlist.xlsx'));
        
        return redirect('/home')->with('success', 'All good!');
    }
}

