<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Invoice;
use Faker\Generator as Faker;

$factory->define(Invoice::class, function (Faker $faker) {
    return [
    	'name' => $faker->bothify('???????###'),
        'date' => $faker->dateTime($max = 'now', $timezone = null),
        'fk_order_id' => rand(1,50), 
    ];
});