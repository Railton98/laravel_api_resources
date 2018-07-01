<?php

use Faker\Generator as Faker;
use App\Models\Student;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'birth' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'sex' => 'F',
        'home_address' => $faker->streetAddress,
    ];
});
