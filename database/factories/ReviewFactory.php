<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\review;
use Faker\Generator as Faker;
use App\product;

$factory->define(review::class, function (Faker $faker) {
    return [
        'product_id' => product::get()->random(),
        'customer'=>$faker->name,
        'star_rating'=>$faker->numberBetween(1,5),
        'review'=>$faker->paragraph,
        

    ];
});
