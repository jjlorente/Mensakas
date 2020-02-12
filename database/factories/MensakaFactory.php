<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Mensaka;
use Faker\Generator as Faker;

$factory->define(Mensaka::class, function (Faker $faker) {
    return [
    	'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'phone' => $faker->bothify('#########'), 
    ];
});
