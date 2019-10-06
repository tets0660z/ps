<?php

namespace App\Http\Controllers\API;

use App\Laboratory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClassRecord;
use App\Student;
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
        return Student::with('schedules')->where('sections',$section)->get();
        // return $classlists;
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        return ['asd'=>'asd'];
        // dd($requesrt->studentId);
        // dd($request->instructorId);
        // $titles = Arr::flatten($request->titles);
        // $student_scores =$request->labStudentScores;
        // $student_ids = $request->studentId;
        // $over_all_scores = Arr::flatten($request->overAllScores); 
        // $dates=Arr::flatten($request->dates);
        // $count_titles = count($titles);

        // //count titles
        // for ($t=0; $t < $count_titles; $t++) { 
        //     //count student id
        //     for ($s_id=0; $s_id < count($student_ids); $s_id++) { 

        //         $student_id = $student_ids[$s_id];
        //         // 
        //         $student_score = Arr::get($student_scores[$t],'studentScores');
        //         ClassRecord::firstOrCreate([
        //             'activity_title'=> $titles[$t],
        //             'id_number' =>$student_id,
        //             'hps' =>$over_all_scores[$t],
        //             'student_score' =>$student_score[$s_id],
        //             'date' => $dates[$t],

        //         ]);
        //     }
            
        // }    
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
