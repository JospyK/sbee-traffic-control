<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Traffic;
use Faker\Generator as Faker;

$factory->define(Traffic::class, function (Faker $faker) {
    return [
        'entre' => $faker->time(),
        'sortie' => $faker->time(),
        'temperature' => rand(28, 38),
        'user_id' => 3,
    ];
});
