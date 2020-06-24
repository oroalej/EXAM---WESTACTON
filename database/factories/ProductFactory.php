<?php

/** @var Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Product::class, static function ( Faker $faker ) {
  return [
    'name'  => $faker->word(),
    'price' => $faker->numberBetween(0, 500),
    'stock' => $faker->numberBetween(1, 100)
  ];
});
