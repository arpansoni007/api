<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
        'name'=>$faker->word,
        'details'=>$faker->paragraph,
        'price'=>$faker->numberBetween(1000,10000),
        'stock'=>$faker->randomDigit,
        'discount'=>$faker->numberBetween(2,18)

    ];
});
