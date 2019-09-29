<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Classlist;
use Faker\Generator as Faker;

$factory->define(Classlist::class, function (Faker $faker) {
    return [
        'id_number' => function () {
            return factory(App\User::class)->create()->id;
        },
        'schedule_id' => function () {
            return factory(App\Schedule::class)->create()->id;
        }
    ];
});
