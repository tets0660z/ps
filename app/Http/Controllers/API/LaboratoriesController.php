<?php

namespace App\Http\Controllers\API;

use App\Laboratory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClassRecord;
use App\ImportedClasslist;
use DB;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
// use App\ImportedClasslist;
class LaboratoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($section)
    {
        $classlists = ImportedClasslist::with('classrecords')->where('sections',$section)->get();
        // dd($classlists);
        return $classlists;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd(Auth::user()->name);
        $titles = Arr::flatten($request->titles);
        $student_scores =$request->labStudentScores;
        $student_ids = $request->studentId;
        $over_all_scores = Arr::flatten($request->overAllScores); 
        // dd($student_scores);
        $count_titles = count($titles);

        //count titles
        for ($t=0; $t < $count_titles; $t++) { 
            //count student id
            for ($s_id=0; $s_id < count($student_ids); $s_id++) { 
                // dd([$t]);

                $student_id = $student_ids[$s_id];
                // 
                $student_score = Arr::get($student_scores[$t],'studentScores');
                ClassRecord::firstOrCreate([
                    'titles'=> $titles[$t],
                    'imported_classlists_id' =>$student_id,
                    'lab_score' =>$over_all_scores[$t],
                    'lab_student_scores' =>$student_score[$s_id],
                    'grid_col' => $s_id,
                    'grid_row' => $t,
                ]);
            }
            
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function show(Laboratory $laboratory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Laboratory $laboratory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Laboratory  $laboratory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratory $laboratory)
    {
        //
    }
}
