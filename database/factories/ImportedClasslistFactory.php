<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ImportedClasslist;
use Faker\Generator as Faker;

$factory->define(ImportedClasslist::class, function (Faker $faker) {
    $section = $faker->randomElement(['IDD1', 'IDC1','IDD2','IDB1', 'IDA1','IDE2']);
    $course = $faker->randomElement(['BSIT','BSCS','BSCpE','ACT']);
    $gender = $faker->randomElement(['male', 'female']);
    return [
        'sections' => $section,
        'student' => $faker->name,
        'course' => $course,
        'gender' => $gender,
    ];
});
