<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Consumer;
use Faker\Generator as Faker;

$factory->define(Consumer::class, function (Faker $faker) {
    return [
    	'first_name' => $faker->firstName,
    	'last_name' => $faker->lastName,
        'phone' => $faker->bothify('#########'),
        'mail' => $faker->unique()->safeEmail,
        'address' => $faker->streetAddress,
        'target' =>$faker->creditCardNumber,
        'city' => $faker->city,

    ];
});