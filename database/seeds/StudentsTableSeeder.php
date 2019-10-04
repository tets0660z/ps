<?php

use Illuminate\Database\Seeder;
class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Student::class,4)->create();
       $schedule=  factory(App\Schedule::class,3)->create();
        App\Student::All()->each(function ($student) use ($schedule){
            $student->schedules()->saveMany($schedule);
         });
    }
}
