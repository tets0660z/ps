<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Schedule;
use Faker\Generator as Faker;

$factory->define(Schedule::class, function (Faker $faker) {
    $section = $faker->randomElement($array = array('IDD1', 'IDD2'));
    $schedule = $faker->randomElement($array = array('m', 't'));
    return [
        'schedule'=>$schedule,
        'section'=>$section,
        'subject_id' => function () {
            return factory(App\Subject::class)->create();
        }
        // 'instructor_id' => function () {
        //     return factory(App\Instructor::class)->create();
        // }
    ];
});
