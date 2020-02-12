<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order_has_pack;
use Faker\Generator as Faker;

//composer require jzonta/faker-restaurant
$factory->define(Order_has_pack::class, function (Faker $faker) {

    return [
    	'fk_order_id' => rand(1,50),
    	'fk_pack_id' => rand(1,50),
    ];
});