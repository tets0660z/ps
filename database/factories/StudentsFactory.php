<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male', 'female']);
    $course = $faker->randomElement(['BSCS', 'BSIT','BSCpE']);
    return [
        'id_number' => $faker->randomNumber($nbDigits = 9, $strict = false),
        'name' => $faker->name,
        'gender' => $gender,
        'course' => $course,
    ];
});
