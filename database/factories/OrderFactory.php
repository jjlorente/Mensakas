<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

//composer require jzonta/faker-restaurant
$factory->define(Order::class, function (Faker $faker) {

    return [
    	'json' => $faker->text,
    	'description' => $faker->text,
    	'fk_consumers_id' => rand(1,50),
    ];
});