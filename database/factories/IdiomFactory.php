<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Idiom;
use Faker\Generator as Faker;

//composer require jzonta/faker-restaurant
$factory->define(Idiom::class, function (Faker $faker) {

    return [
    	'castellano' => Str::random(6),
    	'catalan' => Str::random(6),
    	'ingles' => Str::random(6),
        'fk_product_id' => rand(1,50),
        
    ];
});