<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order_has_product;
use Faker\Generator as Faker;

//composer require jzonta/faker-restaurant
$factory->define(Order_has_product::class, function (Faker $faker) {

    return [
    	'fk_order_id' => rand(1,50),
    	'fk_product_id' => rand(1,50),
    ];
});