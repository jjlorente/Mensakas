<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payment;
use Faker\Generator as Faker;

$factory->define(Payment::class, function (Faker $faker) {
    return [
    	'token' => $faker->bothify('#########'),
        'created_date' => $faker->dateTime($max = 'now', $timezone = null),
        'status' => 1,
        'fk_order_id' => rand(1,50), 
    ];
});
