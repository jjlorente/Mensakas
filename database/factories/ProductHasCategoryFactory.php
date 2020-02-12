<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product_has_category;
use Faker\Generator as Faker;

//composer require jzonta/faker-restaurant
$factory->define(Product_has_category::class, function (Faker $faker) {

    return [
        'fk_product_id' => rand(1,50),
        'fk_product_category_id' => rand(1,50),     
    ];
});