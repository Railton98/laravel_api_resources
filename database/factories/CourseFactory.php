<?php

use Faker\Generator as Faker;
use App\Models\Course;

$factory->define(Course::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'workload' => $faker->randomNumber(2),
        'teacher' => $faker->name,
        'description' => $faker->text(100),
    ];
});
