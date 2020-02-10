<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Pack;
use Faker\Generator as Faker;

//composer require jzonta/faker-restaurant
$factory->define(Pack::class, function (Faker $faker) {

    return [
    	'name' => Str::random(6),
    	'price' => $faker->randomDigit,
        'description' => $faker->text,
        'fk_business_id' => rand(1,50),
        
    ];
});