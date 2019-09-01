<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Instructor;
use Faker\Generator as Faker;

$factory->define(Instructor::class, function (Faker $faker) {
    return [
        'id_number' => $faker->randomNumber($nbDigits = 9, $strict = false),
        'name' => $faker->name,
     
    ];
});
