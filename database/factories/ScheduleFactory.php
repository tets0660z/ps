<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Schedule;
use Faker\Generator as Faker;

$factory->define(Schedule::class, function (Faker $faker) {
    // $section = $faker->randomElement($array = array('IDD1', 'IDD2','IDC4'));
    $section = 'IDD5';
    $day = $faker->randomElement($array = array('m', 't'));
    $teacher = 41;
    return [
        'day'=>$day,
        'section'=>$section,
        // 'teacher_id' => $teacher
    ];
});
