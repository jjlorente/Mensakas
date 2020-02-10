<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Business;
use Faker\Generator as Faker;

$factory->define(Business::class, function (Faker $faker) {
    return [
    	'name' => $faker->name,
        'phone' => $faker->bothify('#########'),
        'mail' => $faker->unique()->safeEmail,
        'zip_code' => $faker->bothify('#####'), 
        'adress' => $faker->address,
        'lat' => $faker->latitude(),
        'lon' => $faker->latitude(),
    ];
});
