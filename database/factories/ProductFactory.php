<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

//composer require jzonta/faker-restaurant
$factory->define(Product::class, function (Faker $faker) {

    return [
    	'name' => Str::random(6),
    	'price' => $faker->randomDigit,
        'description' => $faker->text,
        'fk_business_id' => rand(1,50),
        
    ];
});