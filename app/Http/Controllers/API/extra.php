<?php

namespace App\Http\Controllers\API;

use App\Laboratory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ClassRecord;
// use Illuminate\Support\Str;
use Illuminate\Support\Arr;
class LaboratoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $student_scores = $request->labStudentScores;
        dd($student_scores);
        $titles = Arr::flatten($request->titles);
        $count_titles = count($titles);
       
        //count titles
        for ($c_t=0; $c_t < $count_titles; $c_t++) { 
            $title="";
            $student_score="";

            // get title, 
            for ($index=0; $index <= $c_t; $index++) { 
                $title= $titles[$c_t];
            }
            // get student scores, 
            for ($s_s=0; $s_s <= $c_t; $s_s++) { 
                $student_score= $student_scores[$c_t];
                $scores = Arr::get($student_score, 'studentScores');
                
              
            }
            ClassRecord::firstOrCreate([
                'imported_classlists_id' =>$request->id,
                'date'=> NOW(),
                'titles'=>$title,
            ]);
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
