<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cart;
use Faker\Generator as Faker;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        "title" => $faker->sentence(),
        "product_image" => "img/product.jpg",
        'desc' => $faker->paragraph(20),
        "price" => $faker->numberBetween(100, 900),
        "rating" => $faker->numberBetween(2, 5),
        "stock" => 1,
        "category" => $faker->word(),
    ];
});
