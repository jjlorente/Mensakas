<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Business_category;
use Faker\Generator as Faker;

$factory->define(Business_category::class, function (Faker $faker) {
    return [
    	'name' => $faker->colorName,
        'fk_business_id' => rand(1,50),
    ];
});