<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Schedule;
use Faker\Generator as Faker;

$factory->define(Schedule::class, function (Faker $faker) {
    $section = $faker->randomElement(array(['IDD1','IDD2','IDC3']));
    return [
        'section'=>$section,
        'instructor_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'subject_id' => function () {
            return factory(App\User::class)->create()->id;
        }
    ];
});
